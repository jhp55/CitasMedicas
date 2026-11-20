<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Paciente') - {{ config('app.name', 'CitasMedicas') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <span class="font-bold text-lg text-blue-600">CitasMedicas · Paciente</span>
                <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Inicio</a>
                <a href="{{ route('citas.create') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Agendar cita</a>
                <a href="{{ route('citas.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Mis citas</a>
            </div>
            <div class="flex items-center gap-4 text-sm">
                <span>{{ auth()->user()->name ?? 'Paciente' }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Salir</button>
                </form>
            </div>
        </nav>

        <main class="flex-1 max-w-6xl w-full mx-auto p-6">
            @if (session('success'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('status'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 rounded bg-red-100 text-red-800 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>