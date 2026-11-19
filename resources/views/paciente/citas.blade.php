@extends('layouts.paciente')

@section('title', 'Mis Citas')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-bold text-gray-800">Citas registradas</h1>
            <a href="{{ route('citas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm font-medium hover:bg-blue-700">
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
                        <th class="py-3 px-4">Médico</th>
                        <th class="py-3 px-4">Motivo</th>
                        <th class="py-3 px-4">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($citas ?? [] as $cita)
                        <tr>
                            <td class="py-3 px-4">{{ $cita->fecha }}</td>
                            <td class="py-3 px-4">{{ $cita->hora_inicio }} - {{ $cita->hora_fin }}</td>
                            <td class="py-3 px-4">{{ $cita->paciente->user->name ?? ($cita->paciente->nombre ?? '-') }}</td>
                            <td class="py-3 px-4">{{ $cita->medico->user->name ?? ($cita->medico->nombre ?? '-') }}</td>
                            <td class="py-3 px-4">{{ $cita->motivo ?? '-' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $cita->estado ?? 'pendiente' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-6 px-4 text-center text-gray-500">
                                No hay citas registradas todavía.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection