
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar especialidad
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

                <form action="{{ route('especialidades.update', $especialidad) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">
                            Nombre de la especialidad
                        </label>

                        <input type="text"
                               name="nombre"
                               value="{{ old('nombre', $especialidad->nombre) }}"
                               class="w-full border-gray-300 rounded-lg"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">
                            Descripción
                        </label>

                        <textarea name="descripcion"
                                  rows="4"
                                  class="w-full border-gray-300 rounded-lg">{{ old('descripcion', $especialidad->descripcion) }}</textarea>
                    </div>

                    <div class="flex gap-3 mt-6">

                        <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                            Actualizar especialidad
                        </button>

                        <a href="{{ route('especialidades.index') }}"
                           class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
