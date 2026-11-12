
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de médicos
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
                <a href="{{ route('medicos.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Registrar médico
                </a>
            </div>

            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Nombre</th>
                            <th class="p-3 border">Correo</th>
                            <th class="p-3 border">Documento</th>
                            <th class="p-3 border">Tarjeta profesional</th>
                            <th class="p-3 border">Especialidades</th>
                            <th class="p-3 border">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($medicos as $medico)
                            <tr>
                                <td class="p-3 border">
                                    {{ $medico->user->name }}
                                </td>

                                <td class="p-3 border">
                                    {{ $medico->user->email }}
                                </td>

                                <td class="p-3 border">
                                    {{ $medico->tipo_documento }} -
                                    {{ $medico->numero_documento }}
                                </td>

                                <td class="p-3 border">
                                    {{ $medico->tarjeta_profesional }}
                                </td>

                                <td class="p-3 border">
                                    @forelse ($medico->especialidades as $especialidad)
                                        <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm mb-1">
                                            {{ $especialidad->nombre }}
                                        </span>
                                    @empty
                                        Sin especialidades
                                    @endforelse
                                </td>

                                <td class="p-3 border">
                                    <div class="flex gap-3">
                                        <a href="{{ route('medicos.show', $medico) }}"
                                           class="text-blue-600 hover:underline">
                                            Ver
                                        </a>

                                        <a href="{{ route('medicos.edit', $medico) }}"
                                           class="text-yellow-600 hover:underline">
                                            Editar
                                        </a>

                                        <form action="{{ route('medicos.destroy', $medico) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Deseas eliminar este médico?')">
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
                                    No hay médicos registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
