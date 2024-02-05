<div>
    <livewire:filtrar-vacantes></livewire:filtrar-vacantes>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-300 mb-12 text-center">
                Nuestras Vacantes disponibles
            </h3>
            <div class="bg-gray-500 shadow-sm rounded-lg p-6 divide-y divide-gray-400">
                @forelse ( $vacantes as $vacante )
                    <div class="md:flex md:justify-between md:items-center py-5 ">
                        <div class="md:flex-1">
                            <a class="text-3xl text-gray-300 font-bold " href="{{route('vacantes.show',$vacante->id)}}">{{$vacante->titulo}}
                            </a>
                            <p class="text-base text-gray-200 mb-1">{{$vacante->empresa}}
                            </p>
                            <p class="text-base text-gray-200 mb-1">{{$vacante->categoria->categoria}}
                            </p>
                            <p class="text-base text-gray-200 mb-1">{{$vacante->salario->salario}}
                            </p>
                            <p class="font-bold text-xs text-gray-800">
                                Ultimo dia para Postularse:
                                <span class="font-normal">
                                    {{$vacante->ultimo_dia->format('d/m/Y')}}
                                </span>
                            </p>

                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-teal-500 px-4 py-2 rounded font-bold hover:bg-teal-600 text-sm text-gray-800 block text-center" href="{{route('vacantes.show',$vacante->id)}}">Ver Vacante
                            </a>
                        </div>

                    </div>
                @empty
                    <p class="text-gray-200 font-bold text-center uppercase">No Hay Vacantes Aún</p>
                @endforelse
            </div>
        </div>
         <div class=" p-5 mt-10">
{{$vacantes->links()}}
 </div>
    </div>

</div>
