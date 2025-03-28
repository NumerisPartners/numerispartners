<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? '' }}@hasSection('title')@yield('title')@endif {{ (isset($title) || View::hasSection('title')) ? '|' : '' }} {{ config('app.name', 'Heuristik Partners') }}</title>

        <!-- Dark Mode Initialization - Prevent FOUC -->
        <script>
            // Check for dark mode preference on page load
            if (localStorage.getItem('darkMode') === 'true' || 
                (localStorage.getItem('darkMode') === null && 
                window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/custom.css') }}">
        <link rel="stylesheet" href="{{ mix('css/main.css') }}">

        <!-- Alpine.js via CDN - Mise à jour vers la dernière version -->
        <script src="https://unpkg.com/alpinejs@3.13.3/dist/cdn.min.js" defer></script>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
      
    </head>
    <body class="antialiased home-14 dark:bg-[#050231] dark:text-white">
        <div class="min-h-screen">
            <!-- Skip Nav -->
            @include('layouts.skipnav')
            
            <!-- Header -->
            <header id="main-menu" role="navigation">
                @include('layouts.navigation')
            </header>
            
            <!-- Page Content -->
            <main role="main" id="main-content">
                @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
        
        @stack('scripts')
    </body>
</html>
