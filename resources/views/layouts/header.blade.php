<!-- <header class="bg-[#FFFFFF] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)]">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-[#1b1b18] text-[24px] font-bold">
            Numeris Partners
        </a>
        
        <div class="hidden md:flex space-x-8">
            <a href="{{ route('home') }}" class="text-[#706f6c] hover:text-[#1b1b18] transition">Accueil</a>
            <a href="{{ route('services') }}" class="text-[#706f6c] hover:text-[#1b1b18] transition">Services</a>
            <a href="{{ route('about') }}" class="text-[#706f6c] hover:text-[#1b1b18] transition">À propos</a>
            <a href="{{ route('contact.index') }}" class="text-[#706f6c] hover:text-[#1b1b18] transition">Contact</a>
        </div> -->
        
        <!-- Mobile menu button -->
        <!-- <button class="md:hidden flex items-center text-[#706f6c] focus:outline-none" id="mobile-menu-button">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </nav> -->
    
    <!-- Mobile menu -->
    <!-- <div class="md:hidden hidden bg-[#FFFFFF]" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-[#706f6c] hover:text-[#1b1b18] transition">Accueil</a>
            <a href="{{ route('services') }}" class="block px-3 py-2 text-[#706f6c] hover:text-[#1b1b18] transition">Services</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 text-[#706f6c] hover:text-[#1b1b18] transition">À propos</a>
            <a href="{{ route('contact.index') }}" class="block px-3 py-2 text-[#706f6c] hover:text-[#1b1b18] transition">Contact</a>
        </div>
    </div>
</header> -->

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
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('services') }}">Services</a>
            </li>
            <li>
                <a href="{{ route('about') }}">A propos</a>
            </li>
            <li>
                <a href="{{ route('contact.index') }}">Nous contacter</a>
            </li>
        </ul>
        </div>
        <div class="nav-right-part nav-right-part-desktop custom-md:inline-flex items-center">
            <a class=" btn btn-border-base " >
                <svg class="size-6 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                </svg>  
                Se connecter
            </a>
        </div>
    </div>
    </nav>
</header>
<!-- navbar end -->