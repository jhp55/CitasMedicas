
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitasMedicas | Sistema de Gestión Médica</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

    <!-- Navegación -->
    <header class="bg-white shadow-sm">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-teal-600 text-2xl font-bold text-white">
                    +
                </div>

                <div>
                    <h1 class="text-xl font-bold text-slate-800">
                        CitasMedicas
                    </h1>
                    <p class="text-xs text-slate-500">
                        Sistema de gestión médica
                    </p>
                </div>
            </a>

            <div class="flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}"
                       class="rounded-lg px-4 py-2 font-medium text-slate-600 hover:bg-slate-100">
                        Iniciar sesión
                    </a>

                    <a href="{{ route('register') }}"
                       class="rounded-lg bg-teal-600 px-5 py-2.5 font-semibold text-white hover:bg-teal-700">
                        Registrarse
                    </a>
                @else
                    <span class="hidden text-sm text-slate-600 sm:block">
                        Hola, {{ auth()->user()->name }}
                    </span>

                    <a href="{{ route('dashboard') }}"
                       class="rounded-lg bg-teal-600 px-5 py-2.5 font-semibold text-white hover:bg-teal-700">
                        Ir al panel
                    </a>
                @endguest
            </div>

        </nav>
    </header>

    <main>

        <!-- Presentación principal -->
        <section class="bg-gradient-to-br from-teal-700 to-cyan-600">
            <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-20 md:grid-cols-2 md:py-28">

                <div class="text-white">
                    <span class="mb-5 inline-block rounded-full bg-white/15 px-4 py-2 text-sm font-medium">
                        Tu salud es nuestra prioridad
                    </span>

                    <h2 class="mb-6 text-4xl font-extrabold leading-tight md:text-6xl">
                        Gestiona tu atención médica de forma sencilla
                    </h2>

                    <p class="mb-8 max-w-xl text-lg leading-relaxed text-teal-50">
                        CitasMedicas es una plataforma diseñada para facilitar
                        la gestión de pacientes, médicos, especialidades,
                        citas e historias clínicas desde un solo lugar.
                    </p>

                    @guest
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('register') }}"
                               class="rounded-xl bg-white px-7 py-3.5 font-bold text-teal-700 shadow-lg hover:bg-teal-50">
                                Crear una cuenta
                            </a>

                            <a href="{{ route('login') }}"
                               class="rounded-xl border border-white/60 px-7 py-3.5 font-bold text-white hover:bg-white/10">
                                Iniciar sesión
                            </a>
                        </div>
                    @else
                        <a href="{{ route('dashboard') }}"
                           class="inline-block rounded-xl bg-white px-7 py-3.5 font-bold text-teal-700 shadow-lg hover:bg-teal-50">
                            Acceder al sistema
                        </a>
                    @endguest
                </div>

                <div class="flex justify-center">
                    <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-2xl">
                        <div class="mb-6 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Plataforma médica
                                </p>
                                <h3 class="text-2xl font-bold text-slate-800">
                                    CitasMedicas
                                </h3>
                            </div>

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-3xl text-teal-700">
                                +
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center gap-4 rounded-xl bg-slate-50 p-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-xl">
                                    👨‍⚕️
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800">Médicos</h4>
                                    <p class="text-sm text-slate-500">Gestión de profesionales</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 rounded-xl bg-slate-50 p-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-xl">
                                    📅
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800">Citas médicas</h4>
                                    <p class="text-sm text-slate-500">Organización de consultas</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 rounded-xl bg-slate-50 p-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-xl">
                                    📋
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800">Historias clínicas</h4>
                                    <p class="text-sm text-slate-500">Información de pacientes</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 rounded-xl bg-teal-50 p-4 text-center">
                            <p class="text-sm font-medium text-teal-800">
                                Tecnología al servicio de tu salud
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Módulos del sistema -->
        <section class="mx-auto max-w-7xl px-6 py-20">

            <div class="mb-12 text-center">
                <span class="font-semibold uppercase tracking-wider text-teal-600">
                    Nuestros servicios
                </span>

                <h2 class="mt-3 text-3xl font-bold text-slate-800 md:text-4xl">
                    Todo lo que necesitas en un solo lugar
                </h2>

                <p class="mx-auto mt-4 max-w-2xl text-slate-500">
                    Administra los diferentes procesos de atención médica
                    mediante una plataforma organizada y fácil de utilizar.
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

                @php
                    $modulos = [
                        [
                            'icono' => '👥',
                            'titulo' => 'Pacientes',
                            'descripcion' => 'Registro y administración de información de pacientes.',
                        ],
                        [
                            'icono' => '👨‍⚕️',
                            'titulo' => 'Médicos',
                            'descripcion' => 'Administración de profesionales de la salud.',
                        ],
                        [
                            'icono' => '📅',
                            'titulo' => 'Citas médicas',
                            'descripcion' => 'Organización y seguimiento de citas.',
                        ],
                        [
                            'icono' => '🩺',
                            'titulo' => 'Especialidades',
                            'descripcion' => 'Gestión de las diferentes especialidades médicas.',
                        ],
                        [
                            'icono' => '⏰',
                            'titulo' => 'Horarios',
                            'descripcion' => 'Administración de disponibilidad médica.',
                        ],
                        [
                            'icono' => '📋',
                            'titulo' => 'Historias clínicas',
                            'descripcion' => 'Registro de diagnósticos y observaciones.',
                        ],
                        [
                            'icono' => '💊',
                            'titulo' => 'Medicamentos',
                            'descripcion' => 'Administración del catálogo de medicamentos.',
                        ],
                        [
                            'icono' => '📝',
                            'titulo' => 'Fórmulas médicas',
                            'descripcion' => 'Registro de tratamientos y prescripciones.',
                        ],
                    ];
                @endphp

                @foreach ($modulos as $modulo)
                    <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-50 text-3xl">
                            {{ $modulo['icono'] }}
                        </div>

                        <h3 class="mb-2 text-lg font-bold text-slate-800">
                            {{ $modulo['titulo'] }}
                        </h3>

                        <p class="text-sm leading-relaxed text-slate-500">
                            {{ $modulo['descripcion'] }}
                        </p>
                    </article>
                @endforeach

            </div>

        </section>

        <!-- Llamado a la acción -->
        <section class="bg-slate-100">
            <div class="mx-auto max-w-5xl px-6 py-16 text-center">
                <h2 class="text-3xl font-bold text-slate-800">
                    Bienvenido a CitasMedicas
                </h2>

                <p class="mx-auto mt-4 max-w-2xl text-slate-500">
                    Una herramienta para centralizar y facilitar la administración
                    de los procesos médicos.
                </p>

                @guest
                    <a href="{{ route('register') }}"
                       class="mt-8 inline-block rounded-xl bg-teal-600 px-8 py-3.5 font-bold text-white hover:bg-teal-700">
                        Comenzar ahora
                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                       class="mt-8 inline-block rounded-xl bg-teal-600 px-8 py-3.5 font-bold text-white hover:bg-teal-700">
                        Ir al panel principal
                    </a>
                @endguest
            </div>
        </section>

    </main>

    <!-- Pie de página -->
    <footer class="bg-slate-900 px-6 py-8 text-center text-sm text-slate-400">
        <p>
            © {{ date('Y') }} CitasMedicas. Todos los derechos reservados.
        </p>
        <p class="mt-2">
            Sistema de gestión médica.
        </p>
    </footer>

</body>
</html>
