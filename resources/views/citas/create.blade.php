<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar cita
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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
                <form action="{{ route('citas.store') }}" method="POST">
                    @csrf

                    <h3 class="font-semibold text-lg mb-4">Datos de la cita</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="paciente_id" class="block text-sm font-medium text-gray-700 mb-1">Paciente</label>
                            <select name="paciente_id" id="paciente_id" required class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Seleccione</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                        {{ $paciente->user->name ?? ($paciente->nombre ?? 'Paciente #' . $paciente->id) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="medico_id" class="block text-sm font-medium text-gray-700 mb-1">Médico</label>
                            <select name="medico_id" id="medico_id" required class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Seleccione</option>
                                @foreach ($medicos as $medico)
                                    <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                                        {{ $medico->user->name ?? ($medico->nombre ?? 'Médico #' . $medico->id) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h3 class="font-semibold text-lg mt-6 mb-4">Fecha y horario</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
                            <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}" required class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="hora_inicio" class="block text-sm font-medium text-gray-700 mb-1">Hora de inicio</label>
                            <input type="time" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio') }}" required class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="hora_fin" class="block text-sm font-medium text-gray-700 mb-1">Hora de fin</label>
                            <input type="time" name="hora_fin" id="hora_fin" value="{{ old('hora_fin') }}" required class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <h3 class="font-semibold text-lg mt-6 mb-4">Motivo</h3>

                    <div>
                        <label for="motivo" class="block text-sm font-medium text-gray-700 mb-1">Motivo de consulta</label>
                        <textarea name="motivo" id="motivo" rows="3" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('motivo') }}</textarea>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-3">
                        <a href="{{ route('citas.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-50">
                            Cancelar
                        </a>
                        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>