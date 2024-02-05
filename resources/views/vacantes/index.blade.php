<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('mensaje'))

                <div class=" uppercase border border-green-700 bg-green-100 text-green-700 font-bold p-3 my-3 text-center rounded-lg">
                    {{session('mensaje')}}

                </div>

            @endif
<livewire:mostrar-vacantes></livewire:mostrar-vacantes>
            </div>
        </div>
    </div>
</x-app-layout>
