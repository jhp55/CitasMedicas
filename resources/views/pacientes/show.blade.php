
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información del paciente
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
                        <p class="font-semibold">{{ $paciente->user->name }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Correo electrónico</p>
                        <p class="font-semibold">{{ $paciente->user->email }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Tipo de documento</p>
                        <p class="font-semibold">{{ $paciente->tipo_documento }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Número de documento</p>
                        <p class="font-semibold">{{ $paciente->numero_documento }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Teléfono</p>
                        <p class="font-semibold">{{ $paciente->telefono ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Fecha de nacimiento</p>
                        <p class="font-semibold">{{ $paciente->fecha_nacimiento ?? 'No registrada' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Género</p>
                        <p class="font-semibold">{{ $paciente->genero ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Dirección</p>
                        <p class="font-semibold">{{ $paciente->direccion ?? 'No registrada' }}</p>
                    </div>

                </div>

                <div class="flex gap-3 mt-6">

                    <a href="{{ route('pacientes.edit', $paciente) }}"
                       class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600">
                        Editar
                    </a>

                    <a href="{{ route('pacientes.index') }}"
                       class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                        Volver
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
