
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar paciente
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

                <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block mb-1 font-medium">Nombre completo</label>
                            <input type="text" name="name"
                                   value="{{ old('name', $paciente->user->name) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Correo electrónico</label>
                            <input type="email" name="email"
                                   value="{{ old('email', $paciente->user->email) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Tipo de documento</label>
                            <select name="tipo_documento"
                                    class="w-full border-gray-300 rounded-lg" required>
                                <option value="CC" {{ $paciente->tipo_documento == 'CC' ? 'selected' : '' }}>Cédula de ciudadanía</option>
                                <option value="TI" {{ $paciente->tipo_documento == 'TI' ? 'selected' : '' }}>Tarjeta de identidad</option>
                                <option value="CE" {{ $paciente->tipo_documento == 'CE' ? 'selected' : '' }}>Cédula de extranjería</option>
                                <option value="Pasaporte" {{ $paciente->tipo_documento == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Número de documento</label>
                            <input type="text" name="numero_documento"
                                   value="{{ old('numero_documento', $paciente->numero_documento) }}"
                                   class="w-full border-gray-300 rounded-lg"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Teléfono</label>
                            <input type="text" name="telefono"
                                   value="{{ old('telefono', $paciente->telefono) }}"
                                   class="w-full border-gray-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento"
                                   value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}"
                                   class="w-full border-gray-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Género</label>
                            <select name="genero"
                                    class="w-full border-gray-300 rounded-lg">
                                <option value="">Seleccione</option>
                                <option value="Masculino" {{ $paciente->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ $paciente->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="Otro" {{ $paciente->genero == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Dirección</label>
                            <input type="text" name="direccion"
                                   value="{{ old('direccion', $paciente->direccion) }}"
                                   class="w-full border-gray-300 rounded-lg">
                        </div>

                    </div>

                    <div class="flex gap-3 mt-6">
                        <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                            Actualizar paciente
                        </button>

                        <a href="{{ route('pacientes.index') }}"
                           class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
