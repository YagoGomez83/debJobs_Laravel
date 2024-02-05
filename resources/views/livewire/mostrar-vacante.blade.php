<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-200 my-3">{{$vacante->titulo}}</h3>

        <div class="md:grid md:grid-cols-2 bg-gray-600 p-2 rounded my-10">
            <p class="text-sm font-bold text-gray-200 uppercase my-3">
                    Empresa: <span class="font-normal normal-case">{{$vacante->empresa}}</span>
            </p>
            <p class="text-sm font-bold text-gray-200 uppercase my-3">
                    Ultimo día para postularse: <span class="font-normal normal-case">{{$vacante->ultimo_dia->toFormattedDateString()}}</span>
            </p>
            <p class="text-sm font-bold text-gray-200 uppercase my-3">
                    Categoría: <span class="font-normal normal-case">{{$vacante->categoria->categoria}}</span>
            </p>
            <p class="text-sm font-bold text-gray-200 uppercase my-3">
                    Sueldo: <span class="font-normal normal-case">{{$vacante->salario->salario}}</span>
            </p>
            </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-6 ">
            <div class="md:col-span-2">
                    <img src="{{asset('storage/vacantes/'.$vacante->imagen )}}" alt="{{'imagen de la vacante'.$vacante->titulo}}">
            </div>

            <div class="md:col-span-4">
                <h2 class="text-2xl font-bold mb-5 text-gray-200 text-center">Descripcion del Puesto
                </h2>
                <p class="text-gray-200">{{$vacante->descripcion}}</p>

            </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-600 border border-dashed p-5 text-center rounded">
        <p class="text-gray-200">¿Deseas aplicar o postularte a este puesto? <a class="hover:text-indigo-400 font-bold text-indigo-200 uppercase text-sm" href="{{route('register')}}">Obten una cuenta y postulate</a>
        </p>
    </div>
    @endguest
@cannot('create',App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"></livewire:postular-vacante>
@endcannot


</div>
