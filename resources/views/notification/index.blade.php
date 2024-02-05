<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <h1 class="text-3xl font-bold text-white text-center mb-10 mt-5">Mis Notificaciones</h1>
                    <div class="divide-y divide-gray-500">
                     @forelse ($notificaciones as $notificacion )
                        <div class="p-5  lg:flex lg:justify-between lg:items-center space-y-2">
                            <div>
                                <p class="text-gray-200">Tienes un nuevo candidato en:
                                    <span class="font-bold">{{$notificacion->data['nombre_vacante']}}</span>
                                </p>
                                <p class="text-gray-200">
                                    <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div>
                                <a class ="bg-teal-500 px-4 py-2 rounded font-bold hover:bg-teal-600 text-sm" href="{{route('candidatos.index',$notificacion->data['id_vacante'])}}"
                                    target="_blank"
                                    rel="noreferrer noopener"
                                    >Ver Candidatos
                                </a>

                            </div>
                        </div>
                     @empty
                         <p class="text-center text-gray-200">No hay notificaciones nuevas</p>
                     @endforelse
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
