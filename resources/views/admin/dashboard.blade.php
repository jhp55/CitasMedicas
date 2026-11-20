<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de Administración
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">
                    Hola, {{ auth()->user()->name ?? 'Administrador' }}
                </h3>
                <p class="text-sm text-gray-600 mt-1">
                    Accesos rápidos a los módulos principales de gestión del sistema.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-900">Pacientes</h4>
                        <p class="text-sm text-gray-600 mt-1">Consultar y registrar pacientes.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('pacientes.index') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                            Ir a pacientes
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-900">Médicos</h4>
                        <p class="text-sm text-gray-600 mt-1">Gestionar profesionales de la salud.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('medicos.index') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                            Ir a médicos
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-900">Citas médicas</h4>
                        <p class="text-sm text-gray-600 mt-1">Revisar o agendar citas.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('citas.index') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                            Ver citas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>