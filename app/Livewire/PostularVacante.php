<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Notifications\NuevoCandidato;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;
    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //Almacenar cv en el disco duro
        $cv = $this->cv->store('public/cv');

        $datos['cv'] = str_replace('public/cv/', '', $cv);

        //crear la postulación

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],

        ]);

        //crear la notificación y enviar el email

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //mostrar al usuario el mensaje
        session()->flash('mensaje', 'Postulado correctamente, mucha suerte!!');

        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
