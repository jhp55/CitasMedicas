
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de pacientes
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
                <a href="{{ route('pacientes.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Registrar paciente
                </a>
            </div>

            <div class="bg-white shadow rounded-lg overflow-x-auto">

                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Nombre</th>
                            <th class="p-3 border">Correo</th>
                            <th class="p-3 border">Documento</th>
                            <th class="p-3 border">Teléfono</th>
                            <th class="p-3 border">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pacientes as $paciente)
                            <tr>
                                <td class="p-3 border">
                                    {{ $paciente->user->name }}
                                </td>

                                <td class="p-3 border">
                                    {{ $paciente->user->email }}
                                </td>

                                <td class="p-3 border">
                                    {{ $paciente->tipo_documento }} -
                                    {{ $paciente->numero_documento }}
                                </td>

                                <td class="p-3 border">
                                    {{ $paciente->telefono ?? 'No registrado' }}
                                </td>

                                <td class="p-3 border">
                                    <div class="flex gap-3">

                                        <a href="{{ route('pacientes.show', $paciente) }}"
                                           class="text-blue-600 hover:underline">
                                            Ver
                                        </a>

                                        <a href="{{ route('pacientes.edit', $paciente) }}"
                                           class="text-yellow-600 hover:underline">
                                            Editar
                                        </a>

                                        <form action="{{ route('pacientes.destroy', $paciente) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Deseas eliminar este paciente?')">
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
                                <td colspan="5" class="p-4 text-center text-gray-500">
                                    No hay pacientes registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
