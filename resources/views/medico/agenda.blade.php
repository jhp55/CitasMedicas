<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agenda Médica
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg text-gray-900">Citas programadas</h3>
                    <a href="{{ route('citas.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                        + Nueva cita
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-gray-600">
                            <tr>
                                <th class="py-3 px-4">Fecha</th>
                                <th class="py-3 px-4">Horario</th>
                                <th class="py-3 px-4">Paciente</th>
                                <th class="py-3 px-4">Motivo</th>
                                <th class="py-3 px-4">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($citas ?? [] as $cita)
                                <tr>
                                    <td class="py-3 px-4">{{ $cita->fecha ?? '-' }}</td>
                                    <td class="py-3 px-4">{{ ($cita->hora_inicio ?? '') . ($cita->hora_fin ? ' - ' . $cita->hora_fin : '') }}</td>
                                    <td class="py-3 px-4">{{ $cita->paciente->user->name ?? ($cita->paciente->nombre ?? '-') }}</td>
                                    <td class="py-3 px-4">{{ $cita->motivo ?? '-' }}</td>
                                    <td class="py-3 px-4">{{ $cita->estado ?? 'pendiente' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 px-4 text-center text-gray-500">
                                        No hay citas en la agenda por mostrar.
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