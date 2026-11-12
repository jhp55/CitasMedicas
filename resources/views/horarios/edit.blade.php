
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar horario médico
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('horarios.update', $horario) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Médico</label>

                        <select name="medico_id"
                                class="w-full border-gray-300 rounded-lg"
                                required>
                            @foreach ($medicos as $medico)
                                <option value="{{ $medico->id }}"
                                    {{ old('medico_id', $horario->medico_id) == $medico->id ? 'selected' : '' }}>
                                    {{ $medico->user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Día de la semana</label>

                        <select name="dia_semana"
                                class="w-full border-gray-300 rounded-lg"
                                required>
                            @foreach ([
                                1 => 'Lunes',
                                2 => 'Martes',
                                3 => 'Miércoles',
                                4 => 'Jueves',
                                5 => 'Viernes',
                                6 => 'Sábado',
                                7 => 'Domingo'
                            ] as $numero => $dia)
                                <option value="{{ $numero }}"
                                    {{ old('dia_semana', $horario->dia_semana) == $numero ? 'selected' : '' }}>
                                    {{ $dia }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block mb-1 font-medium">Hora de inicio</label>

                            <input type="time"
                                   name="hora_inicio"
                                   value="{{ old('hora_inicio', substr($horario->hora_inicio, 0, 5)) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Hora de finalización</label>

                            <input type="time"
                                   name="hora_fin"
                                   value="{{ old('hora_fin', substr($horario->hora_fin, 0, 5)) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                    </div>

                    <div class="mt-4">
                        <label class="flex items-center gap-2">
                            <input type="checkbox"
                                   name="disponible"
                                   value="1"
                                   class="rounded border-gray-300"
                                   {{ old('disponible', $horario->disponible) ? 'checked' : '' }}>
                            Horario disponible
                        </label>
                    </div>

                    <div class="flex gap-3 mt-6">

                        <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                            Actualizar horario
                        </button>

                        <a href="{{ route('horarios.index') }}"
                           class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
