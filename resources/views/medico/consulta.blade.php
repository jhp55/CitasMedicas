<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Atención de Consulta
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

            <div class="bg-white shadow rounded-lg p-6 space-y-6">
                <div>
                    <h3 class="font-semibold text-lg text-gray-900">Resumen de la consulta</h3>
                    <p class="text-sm text-gray-600 mt-1">
                        Paciente: <strong>{{ $cita->paciente->user->name ?? ($cita->paciente->nombre ?? 'No seleccionado') }}</strong>
                        · Fecha: <strong>{{ $cita->fecha ?? '-' }}</strong>
                    </p>
                </div>

                <form action="{{ route('citas.index') }}" method="GET" class="space-y-4">
                    <h4 class="font-semibold text-base text-gray-900">Notas clínicas</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="motivo_consulta" class="block text-sm font-medium text-gray-700 mb-1">Motivo</label>
                            <input type="text" id="motivo_consulta" name="motivo_consulta" value="{{ old('motivo_consulta', $cita->motivo ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="diagnostico" class="block text-sm font-medium text-gray-700 mb-1">Diagnóstico</label>
                            <input type="text" id="diagnostico" name="diagnostico" value="{{ old('diagnostico') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label for="observaciones" class="block text-sm font-medium text-gray-700 mb-1">Observaciones y tratamiento</label>
                        <textarea id="observaciones" name="observaciones" rows="4" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('observaciones') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <a href="{{ route('citas.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-50">
                            Volver
                        </a>
                        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                            Guardar nota
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>