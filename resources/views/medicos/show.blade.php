
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información del médico
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-lg font-bold text-gray-800 mb-4">
                    Datos personales
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <p class="text-gray-500 text-sm">Nombre completo</p>
                        <p class="font-semibold">{{ $medico->user->name }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Correo electrónico</p>
                        <p class="font-semibold">{{ $medico->user->email }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Tipo de documento</p>
                        <p class="font-semibold">{{ $medico->tipo_documento }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Número de documento</p>
                        <p class="font-semibold">{{ $medico->numero_documento }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Teléfono</p>
                        <p class="font-semibold">{{ $medico->telefono ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Tarjeta profesional</p>
                        <p class="font-semibold">{{ $medico->tarjeta_profesional }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Precio de consulta</p>
                        <p class="font-semibold">
                            ${{ number_format($medico->precio_consulta, 0, ',', '.') }}
                        </p>
                    </div>

                </div>

                <div class="mt-6">
                    <h3 class="font-bold text-gray-800 mb-3">
                        Especialidades
                    </h3>

                    <div class="flex flex-wrap gap-2">
                        @forelse ($medico->especialidades as $especialidad)
                            <span class="bg-blue-100 text-blue-800 px-3 py-2 rounded-lg">
                                {{ $especialidad->nombre }}
                            </span>
                        @empty
                            <p class="text-gray-500">
                                Este médico no tiene especialidades asignadas.
                            </p>
                        @endforelse
                    </div>
                </div>

                <div class="flex gap-3 mt-6">

                    <a href="{{ route('medicos.edit', $medico) }}"
                       class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600">
                        Editar
                    </a>

                    <a href="{{ route('medicos.index') }}"
                       class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                        Volver
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
