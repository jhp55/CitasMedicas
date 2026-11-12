
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de citas médicas
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
                <a href="{{ route('citas.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Registrar cita
                </a>
            </div>

            <div class="bg-white shadow rounded-lg overflow-x-auto">

                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Paciente</th>
                            <th class="p-3 border">Médico</th>
                            <th class="p-3 border">Fecha</th>
                            <th class="p-3 border">Hora</th>
                            <th class="p-3 border">Estado</th>
                            <th class="p-3 border">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($citas as $cita)
                            <tr>
                                <td class="p-3 border">
                                    {{ $cita->paciente->user->name }}
                                </td>

                                <td class="p-3 border">
                                    {{ $cita->medico->user->name }}
                                </td>

                                <td class="p-3 border">
                                    {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                                </td>

                                <td class="p-3 border">
                                    {{ \Carbon\Carbon::parse($cita->hora_inicio)->format('h:i A') }}
                                    -
                                    {{ \Carbon\Carbon::parse($cita->hora_fin)->format('h:i A') }}
                                </td>

                                <td class="p-3 border">
                                    @if ($cita->estado == 'pendiente')
                                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                                            Pendiente
                                        </span>
                                    @elseif ($cita->estado == 'confirmada')
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                            Confirmada
                                        </span>
                                    @elseif ($cita->estado == 'cancelada')
                                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                                            Cancelada
                                        </span>
                                    @else
                                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">
                                            Completada
                                        </span>
                                    @endif
                                </td>

                                <td class="p-3 border">
                                    <div class="flex gap-3">

                                        <a href="{{ route('citas.show', $cita) }}"
                                           class="text-blue-600 hover:underline">
                                            Ver
                                        </a>

                                        <a href="{{ route('citas.edit', $cita) }}"
                                           class="text-yellow-600 hover:underline">
                                            Editar
                                        </a>

                                        <form action="{{ route('citas.destroy', $cita) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Deseas eliminar esta cita?')">
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
                                    No hay citas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
