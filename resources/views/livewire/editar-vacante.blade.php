
    <form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>

<div>
            <x-input-label for="titulo" :value="__('Titulo Vacante')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text"
            wire:model="titulo"
            :value="old('titulo')"
            placeholder="titulo vacante"
            autocomplete="username" />

            @error('titulo')
                <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
</div>

<div>
            <x-input-label for="salario" :value="__('Salario Mensual')" />
            <select
                id="salario"
                wire:model="salario"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full ">

                <option value="" selected >-Selecciona un salario-</option>
                @foreach ($salarios as $salario )
                    <option value="{{$salario->id}}" >
                        {{$salario->salario}}</option>
                @endforeach

            </select>

            @error('salario')
               <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
</div>

<div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select
                id="categoria"
                wire:model="categoria"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full text-center">

                <option value="" selected >-Selecciona una categoria-</option>
                 @foreach ($categorias as $categoria )
                    <option value="{{$categoria->id}}" >
                        {{$categoria->categoria}}</option>
                @endforeach

            </select>

            @error('categoria')
                <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
</div>

<div>
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input id="empresa" class="block mt-1 w-full" type="text"
            wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: ej MercadoLibre.."
            autocomplete="username" />
            @error('empresa')
                <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
</div>

<div>
            <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date"
            wire:model="ultimo_dia" :value="old('ultimo_dia')"
            autocomplete="username" />
            @error('ultimo_dia')
                 <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
</div>

<div>
            <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
            <textarea
             wire:model="descripcion" id="descripcion" placeholder="Descripción general del puesto, experiencia"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full t h-72"
            ></textarea>
            @error('descripcion')
                <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror

</div>
<div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file"
            wire:model="imagen_actualizada"
            autocomplete="username"
            accept=image/*/>
</div>

<div class="my-5 w-80">
     <x-input-label  :value="__('Imagen Actual')" />
     <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{'Imagen Vacante ' . $titulo}}">
     @error('imagen_actualizada')
                <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
</div>



            <div class="my-5 w-80">
                @if ($imagen_actualizada)

               Imagen Nueva

               <img src="{{$imagen_actualizada->temporaryUrl()}}">

                @endif
            </div>



<x-primary-button class="w-full justify-center">
                {{ __('Editar Vacante') }}
            </x-primary-button>

</form>

