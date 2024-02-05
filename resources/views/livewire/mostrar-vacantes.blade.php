 <div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante )

        <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-700 md:flex justify-between items-center">
            <div class="space-y-3">
                    <a class="text-xl font-bold" href="{{route('vacantes.show',$vacante)}}">{{$vacante->titulo}}
                    </a>
                    <p
                        class="text-sm text-gray-100 font-bold">{{$vacante->empresa}}
                    </p>
                    <p
                        class="text-sm text-gray-500">
                        Último día: {{$vacante->ultimo_dia->format('d/m/Y')}}
                    </p>
            </div>

            <div class="flex flex-col md:flex-row items-stretch gap-3 items-center mt-5 md:mt-0">
                <a
                     href="{{route('candidatos.index',$vacante)}}"
                     class=" text-center mt-2 bg-gray-300 py-2 px-4 rounded-lg text-gray-600 text-xs font-bold uppercase hover:bg-gray-400">
                     {{$vacante->candidatos->count()}}
                     Candidatos
                </a>

                <a
                     href="{{route('vacantes.edit',$vacante->id)}}"
                     class=" text-center mt-2 bg-blue-400 py-2 px-4 rounded-lg text-gray-200 text-xs font-bold uppercase hover:bg-blue-500">
                     Editar
                </a>

                <button
                    wire:click="$dispatch('mostrarAlerta',{id: {{ $vacante->id}}})"
                     class=" text-center mt-2 bg-red-400 py-2 px-4 rounded-lg text-gray-100 text-xs font-bold uppercase hover:bg-red-500">
                     Eliminar
                </button>
            </div>

        </div>

    @empty
            <p class="p-3 text-center text-sm text-gray-100">No hay vacantes aún</p>
    @endforelse


    </div>
    <div class=" mt-10">
        {{$vacantes->links()}}
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
     document.addEventListener('livewire:initialized', () => {
    @this.on('mostrarAlerta',(id)=>{
        Swal.fire({
  title: "Elminar Vacante?",
  text: "¡No podras revertir esto!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, eliminar",
  cancelButtonText:'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    @this.call('eliminarVacante',id);
    Swal.fire({
      title: "Vacante Eliminada!",
      text: "La vacante ha sido eliminada correctamente.",
      icon: "success"
    });
  }
});
    })
})

</script>
@endpush

