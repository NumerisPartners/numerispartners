<nav role="navigation" x-data="{ open: false, darkMode: localStorage.getItem('darkMode') === 'true' }" class="relative z-50 bg-white dark:bg-[#150443] border-b border-gray-100 dark:border-gray-800 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Heuristik Partners Logo" class="h-auto max-w-[250px]">
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                
                    <ul class="hidden md:flex md:items-center md:ml-10 md:space-x-8">
                        <li>
                            <a href="{{ route('home') }}" 
                               class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('home') ? 'border-blue-500 text-blue-600 dark:text-blue-400 font-semibold' : 'border-transparent' }}">
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" 
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('about') ? 'border-blue-500 text-blue-600 dark:text-blue-400 font-semibold' : 'border-transparent' }}">
                                A propos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services') }}" 
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('services') ? 'border-blue-500 text-blue-600 dark:text-blue-400 font-semibold' : 'border-transparent' }}">
                                Services & Expertises
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}" 
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('blog.index') ? 'border-blue-500 text-blue-600 dark:text-blue-400 font-semibold' : 'border-transparent' }}">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}" 
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('contact.index') ? 'border-blue-500 text-blue-600 dark:text-blue-400 font-semibold' : 'border-transparent' }}">
                                Nous contacter
                            </a>
                        </li>
                    </ul>
                
            </div>

            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <button 
                    @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); 
                            if(darkMode) { document.documentElement.classList.add('dark') } 
                            else { document.documentElement.classList.remove('dark') }" 
                    class="relative inline-flex h-7 w-12 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-indigo-100 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:bg-gray-700"
                    :class="{ 'bg-gray-600': darkMode }"
                    role="switch"
                    :aria-checked="darkMode"
                    aria-label="Changer le thème"
                >
                    <span class="sr-only">Changer le thème</span>
                    <span
                        aria-hidden="true"
                        class="pointer-events-none justify-center h-6 w-6 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out flex items-center justify-center"
                        :class="{ 'translate-x-5': darkMode, 'translate-x-0': !darkMode }"
                    >
                        <!-- Sun icon -->
                        <svg x-show="!darkMode" class="h-4 w-4 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Moon icon -->
                        <svg x-show="darkMode" class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </span>
                </button>

                <!-- Authentication Links (Desktop) -->
                @guest
                    <div class="hidden md:flex md:items-center md:space-x-3">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800">
                            <svg class="h-4 w-4 text-white me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(255,255,255,1)"><path d="M4 15H6V20H18V4H6V9H4V3C4 2.44772 4.44772 2 5 2H19C19.5523 2 20 2.44772 20 3V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V15ZM10 11V8L15 12L10 16V13H2V11H10Z"></path></svg>
                            Se connecter
                        </a>    
                    </div>
                @else
                    <!-- Settings Dropdown (Desktop) -->
                    <div class="hidden md:block relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                        <div @click="open = ! open">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-300 bg-white dark:bg-[#150443] hover:text-gray-700 dark:hover:text-white focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </div>

                        <div x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0"
                                style="display: none;"
                                @click="open = false">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-gray-800">
                                <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out">
                                    Profil
                                </a>
                                <a href="{{ route('my-registrations.index') }}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out">
                                    Mes inscriptions
                                </a>
                                <a href="{{ route('dashboard') }}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out">
                                    Tableau de bord
                                </a>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                            class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out">
                                        Déconnexion
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-200 hover:text-gray-500 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 focus:text-gray-500 dark:focus:text-white transition duration-150 ease-in-out" aria-label="Menu principal">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-show="open" class="md:hidden" style="display: none;">
        <ul class="pt-2 pl-0 pb-3 space-y-1">
            <li>
            <a href="{{ route('home') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('home') ? 'border-blue-500 text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 font-semibold' : 'border-transparent' }}">
                Accueil
            </a>
            </li>
            <li>
            <a href="{{ route('about') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('about') ? 'border-blue-500 text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 font-semibold' : 'border-transparent' }}">
                A propos
            </a>
            </li>
            <li>
            <a href="{{ route('services') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('services') ? 'border-blue-500 text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 font-semibold' : 'border-transparent' }}">
                Services & Expertises
            </a>
            </li>
            <li>
            <a href="{{ route('blog.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('blog.index') ? 'border-blue-500 text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 font-semibold' : 'border-transparent' }}">
                Blog
            </a>
            </li>
            <li>
            <a href="{{ route('contact.index') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out dark:text-white hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('contact.index') ? 'border-blue-500 text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 font-semibold' : 'border-transparent' }}">
                Nous contacter
            </a>
            </li>
        </ul>   

        <!-- Mobile Authentication Links -->
        @guest
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
                <div class="flex flex-col items-center px-4 space-y-2">
                    <a href="{{ route('login') }}" class="w-full inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                        <svg class="h-4 w-4 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(0,0,0,1)"><path d="M4 15H6V20H18V4H6V9H4V3C4 2.44772 4.44772 2 5 2H19C19.5523 2 20 2.44772 20 3V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V15ZM10 11V8L15 12L10 16V13H2V11H10Z"></path></svg>
                        Se connecter
                    </a>
                </div>
            </div>
        @else
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <ul class="p-0 m-0">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 transition duration-150 ease-in-out">
                                Profil
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('my-registrations.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 transition duration-150 ease-in-out">
                                Mes inscriptions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 transition duration-150 ease-in-out">
                                Tableau de bord
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 transition duration-150 ease-in-out">
                                Gestion des utilisateurs
                            </a>
                        </li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 transition duration-150 ease-in-out">
                                    Déconnexion
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endguest
    </div>
</nav>
