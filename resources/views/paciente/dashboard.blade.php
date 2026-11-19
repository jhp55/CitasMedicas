@extends('layouts.paciente')

@section('title', 'Panel del Paciente')

@section('content')
    <div class="space-y-6">
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <h1 class="text-2xl font-bold text-gray-800">Hola, {{ auth()->user()->name ?? 'Paciente' }}</h1>
            <p class="text-gray-600 mt-1">Gestiona tus citas médicas y consulta su estado desde tu panel.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Agendar una cita</h2>
                    <p class="text-sm text-gray-600 mt-1">Selecciona paciente, médico, fecha y franja horaria.</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('citas.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded text-sm font-medium hover:bg-blue-700">
                        Ir a agendar
                    </a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Mis citas programadas</h2>
                    <p class="text-sm text-gray-600 mt-1">Revisa horarios, médicos asignados y estado actual.</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('citas.index') }}" class="inline-block bg-gray-800 text-white px-4 py-2 rounded text-sm font-medium hover:bg-gray-900">
                        Ver mis citas
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection