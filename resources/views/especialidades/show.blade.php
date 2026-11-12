
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información de la especialidad
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <div class="mb-5">
                    <p class="text-gray-500 text-sm">
                        Nombre de la especialidad
                    </p>

                    <h3 class="text-xl font-bold text-gray-800">
                        {{ $especialidad->nombre }}
                    </h3>
                </div>

                <div class="mb-5">
                    <p class="text-gray-500 text-sm">
                        Descripción
                    </p>

                    <p class="text-gray-800">
                        {{ $especialidad->descripcion ?? 'Sin descripción registrada' }}
                    </p>
                </div>

                <div class="mb-5">
                    <p class="text-gray-500 text-sm">
                        Médicos asociados
                    </p>

                    @forelse ($especialidad->medicos as $medico)
                        <p class="font-medium">
                            {{ $medico->user->name }}
                        </p>
                    @empty
                        <p class="text-gray-500">
                            No hay médicos asociados a esta especialidad.
                        </p>
                    @endforelse
                </div>

                <div class="flex gap-3 mt-6">

                    <a href="{{ route('especialidades.edit', $especialidad) }}"
                       class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600">
                        Editar
                    </a>

                    <a href="{{ route('especialidades.index') }}"
                       class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                        Volver
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
