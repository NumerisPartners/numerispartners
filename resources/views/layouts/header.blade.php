<!-- navbar start -->
<header>
    <nav class="navbar navbar-area navbar-area-2 !mt-0 navbar-expand-lg bg-white">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
        <button class="menu toggle-btn block custom-md:hidden" data-target="#itech_main_menu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="icon-left"></span>
            <span class="icon-right"></span>
        </button>
        </div>
        <div class="logo">
        <a href="index.html"><img src="./images/logo.png" alt="img"></a>
        </div>
        <div class="nav-right-part nav-right-part-mobile">
        <a class="search-bar-btn" href="index.html">
            <i class="fa fa-search"></i>
        </a>
        </div>
        <div class="collapse navbar-collapse" id="itech_main_menu">
        <ul class="navbar-nav menu-open custom-md:!text-center custom-md:ps-[48px]">
            <li>
                <a href="{{ route('home') }}">Accueil</a>
            </li>
            <li>
                <a href="{{ route('about') }}">A propos</a>
            </li>
            <li>
                <a href="{{ route('services') }}">Services & Expertises</a>
            </li>
            <li>
                <a href="{{ route('contact.index') }}">Nous contacter</a>
            </li>
            @auth
            <li>
                <a href="{{ route('dashboard') }}">Tableau de bord</a>
            </li>
            @endauth
        </ul>
        </div>
        <div class="nav-right-part nav-right-part-desktop custom-md:inline-flex items-center">
            @guest
                <a href="{{ route('login') }}" class="btn btn-border-base me-2">
                    <svg class="size-6 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>  
                    Se connecter
                </a>
                <a href="{{ route('register') }}" class="btn btn-base">
                    S'inscrire
                </a>
            @else
                <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                    <button @click="open = ! open" class="btn btn-border-base flex items-center">
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
                        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                Profil
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endguest
        </div>
    </div>
    </nav>
</header>
<!-- navbar end -->