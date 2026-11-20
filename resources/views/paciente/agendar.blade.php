@extends('layouts.paciente')

@section('title', 'Agendar Cita')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-sm max-w-2xl">
        <h1 class="text-xl font-bold text-gray-800 mb-4">Agendar nueva cita</h1>

        <form method="POST" action="{{ route('citas.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="paciente_id" class="block text-sm font-medium text-gray-700 mb-1">Paciente</label>
                <select id="paciente_id" name="paciente_id" required class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Selecciona un paciente</option>
                    @foreach ($pacientes ?? [] as $paciente)
                        <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                            {{ $paciente->user->name ?? ($paciente->nombre ?? 'Paciente #' . $paciente->id) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="medico_id" class="block text-sm font-medium text-gray-700 mb-1">Médico</label>
                <select id="medico_id" name="medico_id" required class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Selecciona un médico</option>
                    @foreach ($medicos ?? [] as $medico)
                        <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                            {{ $medico->user->name ?? ($medico->nombre ?? 'Médico #' . $medico->id) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
                <input type="date" id="fecha" name="fecha" value="{{ old('fecha') }}" required class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="hora_inicio" class="block text-sm font-medium text-gray-700 mb-1">Hora de inicio</label>
                    <input type="time" id="hora_inicio" name="hora_inicio" value="{{ old('hora_inicio') }}" required class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div>
                    <label for="hora_fin" class="block text-sm font-medium text-gray-700 mb-1">Hora de fin</label>
                    <input type="time" id="hora_fin" name="hora_fin" value="{{ old('hora_fin') }}" required class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <div>
                <label for="motivo" class="block text-sm font-medium text-gray-700 mb-1">Motivo de consulta</label>
                <textarea id="motivo" name="motivo" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Describe brevemente el motivo de la cita">{{ old('motivo') }}</textarea>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-blue-700">
                    Guardar cita
                </button>
                <a href="{{ route('citas.index') }}" class="text-sm text-gray-600 hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
@endsection