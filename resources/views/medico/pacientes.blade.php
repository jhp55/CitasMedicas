<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pacientes Asignados
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg text-gray-900">Listado de pacientes</h3>
                    <a href="{{ route('pacientes.index') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                        Ver gestión completa
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-gray-600">
                            <tr>
                                <th class="py-3 px-4">Nombre</th>
                                <th class="py-3 px-4">Correo</th>
                                <th class="py-3 px-4">Teléfono</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($pacientes ?? [] as $paciente)
                                <tr>
                                    <td class="py-3 px-4">{{ $paciente->user->name ?? ($paciente->nombre ?? '-') }}</td>
                                    <td class="py-3 px-4">{{ $paciente->user->email ?? ($paciente->email ?? '-') }}</td>
                                    <td class="py-3 px-4">{{ $paciente->telefono ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-6 px-4 text-center text-gray-500">
                                        No hay pacientes registrados para mostrar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
