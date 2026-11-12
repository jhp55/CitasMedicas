
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de horarios médicos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('horarios.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Registrar horario
                </a>
            </div>

            <div class="bg-white shadow rounded-lg overflow-x-auto">

                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Médico</th>
                            <th class="p-3 border">Día</th>
                            <th class="p-3 border">Hora inicio</th>
                            <th class="p-3 border">Hora fin</th>
                            <th class="p-3 border">Disponibilidad</th>
                            <th class="p-3 border">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($horarios as $horario)
                            <tr>
                                <td class="p-3 border">
                                    {{ $horario->medico->user->name }}
                                </td>

                                <td class="p-3 border">
                                    @php
                                        $dias = [
                                            1 => 'Lunes',
                                            2 => 'Martes',
                                            3 => 'Miércoles',
                                            4 => 'Jueves',
                                            5 => 'Viernes',
                                            6 => 'Sábado',
                                            7 => 'Domingo'
                                        ];
                                    @endphp

                                    {{ $dias[$horario->dia_semana] ?? 'No definido' }}
                                </td>

                                <td class="p-3 border">
                                    {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('h:i A') }}
                                </td>

                                <td class="p-3 border">
                                    {{ \Carbon\Carbon::parse($horario->hora_fin)->format('h:i A') }}
                                </td>

                                <td class="p-3 border">
                                    @if ($horario->disponible)
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                            Disponible
                                        </span>
                                    @else
                                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                                            No disponible
                                        </span>
                                    @endif
                                </td>

                                <td class="p-3 border">
                                    <div class="flex gap-3">

                                        <a href="{{ route('horarios.show', $horario) }}"
                                           class="text-blue-600 hover:underline">
                                            Ver
                                        </a>

                                        <a href="{{ route('horarios.edit', $horario) }}"
                                           class="text-yellow-600 hover:underline">
                                            Editar
                                        </a>

                                        <form action="{{ route('horarios.destroy', $horario) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Deseas eliminar este horario?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="text-red-600 hover:underline">
                                                Eliminar
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-500">
                                    No hay horarios registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
