<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perfil del Paciente
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6 space-y-6">
                <div>
                    <h3 class="font-semibold text-lg text-gray-900">Información de la cuenta</h3>
                    <p class="text-sm text-gray-600 mt-1">
                        Datos básicos asociados a tu usuario en el sistema.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div class="p-4 bg-gray-50 rounded-md">
                        <span class="block text-gray-500">Nombre</span>
                        <span class="font-medium text-gray-900">{{ auth()->user()->name ?? '-' }}</span>
                    </div>

                    <div class="p-4 bg-gray-50 rounded-md">
                        <span class="block text-gray-500">Correo electrónico</span>
                        <span class="font-medium text-gray-900">{{ auth()->user()->email ?? '-' }}</span>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                        Editar perfil completo
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>