<div class="bg-gray-600 text-gray-200 mt-10 p-5 flex flex-col justify-center items-center rounded">
    <h3 class="text-center text-2xl font-bold my-4 uppercase">Postularme al puesto</h3>
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 rounded">
            {{session('mensaje')}}
        </div>
        @else
            <form wire:submit.prevent='postularme' class="w-96 mt-5">
                <div class="mb-4">
                    <x-input-label for="cv" :value="__('Curriculum-(PDF)')" />
                    <x-text-input id="cv" class="block mt-1 w-full" type="file" accept='.pdf' name="cv" wire:model="cv" />
                </div>
                @error('cv')
                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                @enderror
                <x-primary-button class="w-full justify-center my-5">
                        {{ __('Postularse') }}
                    </x-primary-button>
            </form>

    @endif

</div>
