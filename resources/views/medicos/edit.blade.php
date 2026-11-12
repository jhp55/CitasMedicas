
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar médico
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

                <form action="{{ route('medicos.update', $medico) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h3 class="font-semibold text-lg mb-4">Datos de acceso</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block mb-1 font-medium">Nombre completo</label>
                            <input type="text" name="name"
                                   value="{{ old('name', $medico->user->name) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Correo electrónico</label>
                            <input type="email" name="email"
                                   value="{{ old('email', $medico->user->email) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                    </div>

                    <h3 class="font-semibold text-lg mt-6 mb-4">Datos profesionales</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block mb-1 font-medium">Tipo de documento</label>
                            <select name="tipo_documento"
                                    class="w-full border-gray-300 rounded-lg" required>
                                <option value="CC" {{ old('tipo_documento', $medico->tipo_documento) == 'CC' ? 'selected' : '' }}>Cédula de ciudadanía</option>
                                <option value="CE" {{ old('tipo_documento', $medico->tipo_documento) == 'CE' ? 'selected' : '' }}>Cédula de extranjería</option>
                                <option value="Pasaporte" {{ old('tipo_documento', $medico->tipo_documento) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Número de documento</label>
                            <input type="text" name="numero_documento"
                                   value="{{ old('numero_documento', $medico->numero_documento) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Teléfono</label>
                            <input type="text" name="telefono"
                                   value="{{ old('telefono', $medico->telefono) }}"
                                   class="w-full border-gray-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Tarjeta profesional</label>
                            <input type="text" name="tarjeta_profesional"
                                   value="{{ old('tarjeta_profesional', $medico->tarjeta_profesional) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Precio de consulta</label>
                            <input type="number" name="precio_consulta"
                                   value="{{ old('precio_consulta', $medico->precio_consulta) }}"
                                   min="0" step="0.01"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                    </div>

                    <h3 class="font-semibold text-lg mt-6 mb-4">Especialidades</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach ($especialidades as $especialidad)
                            <label class="flex items-center gap-2">
                                <input type="checkbox"
                                       name="especialidades[]"
                                       value="{{ $especialidad->id }}"
                                       class="rounded border-gray-300"
                                       {{ in_array($especialidad->id, old('especialidades', $medico->especialidades->pluck('id')->toArray())) ? 'checked' : '' }}>
                                {{ $especialidad->nombre }}
                            </label>
                        @endforeach
                    </div>

                    <div class="flex gap-3 mt-6">
                        <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                            Actualizar médico
                        </button>

                        <a href="{{ route('medicos.index') }}"
                           class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
