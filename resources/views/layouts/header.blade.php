<!-- navbar start -->
<header role="navigation">
    <nav class="navbar navbar-area navbar-area-2 !mt-0 navbar-expand-lg bg-white dark:bg-[#150443]" aria-label="Navigation principale">
    <div class="container nav-container">
        
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="img"></a>
        </div>
        
        <div class="collapse navbar-collapse" id="itech_main_menu">
        <ul class="navbar-nav menu-open custom-md:!text-center custom-md:ps-[48px]" aria-label="Menu principal">
             
            <li>
                <a href="{{ route('home') }}" class="dark:text-white {{ request()->routeIs('home') ? 'active font-semibold text-blue-600 dark:text-blue-400' : '' }}" {{ request()->routeIs('home') ? 'aria-current="page"' : '' }}>Accueil</a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="dark:text-white {{ request()->routeIs('about') ? 'active font-semibold text-blue-600 dark:text-blue-400' : '' }}" {{ request()->routeIs('about') ? 'aria-current="page"' : '' }}>A propos</a>
            </li>
            <li>
                <a href="{{ route('services') }}" class="dark:text-white {{ request()->routeIs('services') ? 'active font-semibold text-blue-600 dark:text-blue-400' : '' }}" {{ request()->routeIs('services') ? 'aria-current="page"' : '' }}>Services & Expertises</a>
            </li>
            <li>
                <a href="{{ route('contact.index') }}" class="dark:text-white {{ request()->routeIs('contact.index') ? 'active font-semibold text-blue-600 dark:text-blue-400' : '' }}" {{ request()->routeIs('contact.index') ? 'aria-current="page"' : '' }}>Nous contacter</a>
            </li>
           
        </ul>
        </div>
        <div class="nav-right-part nav-right-part-desktop custom-md:inline-flex items-center">
            <!-- Theme Toggle pour desktop -->
            <div x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" class="mr-4 hidden custom-md:block">
                <button 
                    @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); 
                            if(darkMode) { document.documentElement.classList.add('dark') } 
                            else { document.documentElement.classList.remove('dark') }" 
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:bg-gray-700"
                    :class="{ 'bg-gray-600': darkMode }"
                    role="switch"
                    :aria-checked="darkMode"
                >
                    <span class="sr-only">Toggle theme</span>
                    <span
                        aria-hidden="true"
                        class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out flex items-center justify-center"
                        :class="{ 'translate-x-5': darkMode, 'translate-x-0': !darkMode }"
                    >
                        <!-- Sun icon -->
                        <svg x-show="!darkMode" class="h-3 w-3 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Moon icon -->
                        <svg x-show="darkMode" class="h-3 w-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </span>
                </button>
            </div>
            
            @guest
                <a href="{{ route('login') }}" class="btn btn-border-base me-2 dark:text-white">
                    <svg class="size-6 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V9m3 0V5.25A2.25 2.25 0 0 1 19.5 3h-6a2.25 2.25 0 0 1-2.25 2.25v13.5A2.25 2.25 0 0 1 7.5 21h6a2.25 2.25 0 0 1 2.25-2.25z" />
                    </svg>  
                    Se connecter
                </a>
                <!-- <a href="{{ route('register') }}" class="btn btn-base">
                    S'inscrire
                </a> -->
                <a href="{{ route('register') }}" class="border-2 border-blue-500 text-blue-600 px-6 py-2 rounded-full hover:bg-blue-500 hover:text-white transition duration-300 shadow-sm dark:text-white">
                    S'inscrire
                </a>
            @else
                <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                    <button @click="open = ! open" class="btn btn-border-base flex items-center dark:text-white">
                        {{ Auth::user()->name }}
                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0"
                         style="display: none;">
                        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-[#050231]">
                            <ul>
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active font-semibold text-blue-600 dark:text-blue-400' : '' }} block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-white" {{ request()->routeIs('profile.edit') ? 'aria-current="page"' : '' }}>
                                        Profil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard') }}" class="dark:text-white {{ request()->routeIs('dashboard') ? 'active font-semibold text-blue-600 dark:text-blue-400' : '' }}" {{ request()->routeIs('dashboard') ? 'aria-current="page"' : '' }}>Dashboard</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-white">
                                            Déconnexion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endguest
        </div>
    </div>

      <!-- Responsive Navigation Menu -->
      <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="responsive-mobile-menu">
            <button class="menu toggle-btn block custom-md:hidden" data-target="#itech_main_menu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-left"></span>
                <span class="icon-right"></span>
            </button>
        </div>


        <div class="nav-right-part nav-right-part-mobile">
           <!-- Theme Toggle pour mobile -->
           <div x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" class="mr-4 block custom-md:hidden">
                <button 
                    @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); 
                            if(darkMode) { document.documentElement.classList.add('dark') } 
                            else { document.documentElement.classList.remove('dark') }" 
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:bg-gray-700"
                    :class="{ 'bg-gray-600': darkMode }"
                    role="switch"
                    :aria-checked="darkMode"
                >
                    <span class="sr-only">Toggle theme</span>
                    <span
                        aria-hidden="true"
                        class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out flex items-center justify-center"
                        :class="{ 'translate-x-5': darkMode, 'translate-x-0': !darkMode }"
                    >
                        <!-- Sun icon -->
                        <svg x-show="!darkMode" class="h-3 w-3 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Moon icon -->
                        <svg x-show="darkMode" class="h-3 w-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>


      </div>
    </nav>
</header>
<!-- navbar end -->