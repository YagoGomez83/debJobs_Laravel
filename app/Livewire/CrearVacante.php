<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component


{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];
    public function render()
    {
        //Consiultar la base de datos

        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [

            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }

    public function crearVacante()
    {
        $datos = $this->validate();

        //almacenamis la imagen

        $imagen = $this->imagen->store('public/vacantes');

        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        //dd($nombre_imagen);

        //creamos la Vacante

        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id
        ]);


        //creamos el mensaje

        session()->flash('mensaje', 'La vacante se publicó correctamente');

        //redireccionamos al usuario
        return redirect()->route('vacantes.index');
    }
}
