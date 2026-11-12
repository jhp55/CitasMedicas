
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información del horario
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                @php
                    $dias = [
                        1 => 'Lunes',
                        2 => 'Martes',
                        3 => 'Miércoles',
                        4 => 'Jueves',
                        5 => 'Viernes',
                        6 => 'Sábado',
                        7 => 'Domingo'
                    ];
                @endphp

                <div class="mb-5">
                    <p class="text-gray-500 text-sm">Médico</p>
                    <p class="font-semibold text-lg">
                        {{ $horario->medico->user->name }}
                    </p>
                </div>

                <div class="mb-5">
                    <p class="text-gray-500 text-sm">Día de atención</p>
                    <p class="font-semibold">
                        {{ $dias[$horario->dia_semana] ?? 'No definido' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <p class="text-gray-500 text-sm">Hora de inicio</p>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('h:i A') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Hora de finalización</p>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($horario->hora_fin)->format('h:i A') }}
                        </p>
                    </div>

                </div>

                <div class="mt-5">
                    <p class="text-gray-500 text-sm">Disponibilidad</p>

                    @if ($horario->disponible)
                        <span class="inline-block bg-green-100 text-green-700 px-3 py-2 rounded">
                            Disponible
                        </span>
                    @else
                        <span class="inline-block bg-red-100 text-red-700 px-3 py-2 rounded">
                            No disponible
                        </span>
                    @endif
                </div>

                <div class="flex gap-3 mt-6">

                    <a href="{{ route('horarios.edit', $horario) }}"
                       class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600">
                        Editar
                    </a>

                    <a href="{{ route('horarios.index') }}"
                       class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                        Volver
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
