
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Panel principal - CitasMedicas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-2">
                        ¡Bienvenido a CitasMedicas!
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300">
                        Desde este panel podrás gestionar los procesos
                        relacionados con la atención médica.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-white">
                        Pacientes
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Gestionar información de pacientes.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-white">
                        Médicos
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Administrar profesionales médicos.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-white">
                        Citas médicas
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Consultar y gestionar citas.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-white">
                        Especialidades
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Administrar especialidades médicas.
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
