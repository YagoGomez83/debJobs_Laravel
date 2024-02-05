<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos de la Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <h1 class="text-3xl font-bold text-white text-center mb-10 mt-5">Candidatos de la Vacante: {{$vacante->titulo}}</h1>
                    <div class="md:flex md:justify-center p-5">
                            <ul class="divide-y divide-gray-500 w-full">
                                @forelse ($vacante->candidatos as $candidato )
                                    <li class="p-3 flex items-center">
                                        <div class="flex-1">
                                            <p class="text-xl font-medium text-gray-200 " >
                                                {{$candidato->user->name}}
                                            </p>
                                            <p class="text-sm   text-gray-300 " >
                                                {{$candidato->user->email}}
                                            </p>
                                            <p class="text-sm   text-gray-300 font-normal ">
                                                Se postulo:
                                                <span class="font-medium">
                                                {{$candidato->created_at->diffForHumans()}}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="">
                                                <a
                                                    class="inline-flex items-center shadow-sm px-2.5 py-0.5 border-gray-200 text-sm leading-5 font-medium rounded bg-gray-600 hover:bg-gray-700"
                                                    href="{{asset('storage/cv/'.$candidato->cv)}}"
                                                    target="_blank"
                                                    rel="noreferrer noopener"
                                                    >
                                                    Ver cv
                                                </a>
                                        </div>
                                    </li>
                                @empty
                                    <p class="text-gray-200 text-center text-sm p-3">No hay candidatos aún</p>
                                @endforelse

                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
