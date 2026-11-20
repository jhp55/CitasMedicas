<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel del Médico
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">
                    Hola, {{ auth()->user()->name ?? 'Médico' }}
                </h3>
                <p class="text-sm text-gray-600 mt-1">
                    Revisa tu agenda, consulta pacientes y gestiona la atención médica.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-900">Agenda de citas</h4>
                        <p class="text-sm text-gray-600 mt-1">Consulta las citas programadas.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('citas.index') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                            Ver citas
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-900">Pacientes</h4>
                        <p class="text-sm text-gray-600 mt-1">Accede al listado de pacientes.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('pacientes.index') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                            Ver pacientes
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-900">Nueva cita</h4>
                        <p class="text-sm text-gray-600 mt-1">Registra una atención en el sistema.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('citas.create') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                            Registrar cita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>