
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">

    <!-- Menú principal -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo y enlaces -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-teal-600 text-2xl font-bold text-white">
                            +
                        </div>

                        <div>
                            <span class="block text-lg font-bold text-gray-800 dark:text-white">
                                CitasMedicas
                            </span>
                            <span class="block text-xs text-gray-500 dark:text-gray-400">
                                Gestión médica
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Enlaces de navegación -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="route('dashboard')"
                                :active="request()->routeIs('dashboard')">
                        Inicio
                    </x-nav-link>

                    <x-nav-link :href="route('pacientes.index')"
                                :active="request()->routeIs('pacientes.*')">
                        Pacientes
                    </x-nav-link>

                    <x-nav-link :href="route('medicos.index')"
                                :active="request()->routeIs('medicos.*')">
                        Médicos
                    </x-nav-link>

                    <x-nav-link :href="route('citas.index')"
                                :active="request()->routeIs('citas.*')">
                        Citas
                    </x-nav-link>

                    <x-nav-link :href="route('especialidades.index')"
                                :active="request()->routeIs('especialidades.*')">
                        Especialidades
                    </x-nav-link>

                </div>
            </div>

            <!-- Menú de usuario -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition">

                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>

                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Mi perfil
                        </x-dropdown-link>

                        <!-- Cerrar sesión -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Botón menú móvil -->
            <div class="-me-2 flex items-center sm:hidden">

                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path :class="{'hidden': open, 'inline-flex': ! open}"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>

                        <path :class="{'hidden': ! open, 'inline-flex': open}"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>

                    </svg>
                </button>

            </div>

        </div>
    </div>

    <!-- Menú responsive -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('dashboard')"
                                   :active="request()->routeIs('dashboard')">
                Inicio
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('pacientes.index')"
                                   :active="request()->routeIs('pacientes.*')">
                Pacientes
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('medicos.index')"
                                   :active="request()->routeIs('medicos.*')">
                Médicos
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('citas.index')"
                                   :active="request()->routeIs('citas.*')">
                Citas
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('especialidades.index')"
                                   :active="request()->routeIs('especialidades.*')">
                Especialidades
            </x-responsive-nav-link>

        </div>

        <!-- Información del usuario -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">

            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    Mi perfil
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Cerrar sesión
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>

    </div>

</nav>
