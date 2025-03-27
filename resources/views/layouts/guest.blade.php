<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title . ' | ' . config('app.name', 'Numeris Partners') : config('app.name', 'Numeris Partners') }}</title>

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
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        
        <!-- Alpine.js via CDN - Mise à jour vers la dernière version -->
        <script src="https://unpkg.com/alpinejs@3.13.3/dist/cdn.min.js"></script>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased home-14 dark:bg-[#050231]  dark:text-white">
        <!-- Header -->
        @include('layouts.navigation')

        <!-- Breadcrumb -->
        {{-- <div class="breadcrumb-area bg-relative bg-cover bg-center">
            <div class="banner-bg-img"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="breadcrumb-inner text-center">
                            <h1>{{ isset($title) ? $title : 'Authentification' }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Auth Content -->
        <div class="service-area pd-top-120 pd-bottom-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="bg-[#f8f9fc] dark:bg-[#150443] p-12 rounded-md wow animated fadeInUp single-blog-inner style-2">
                            <div class="details">
                                @if(isset($slot))
                                    {{ $slot }}
                                @else
                                    @yield('content')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('layouts.footer')

        @stack('scripts')
    </body>
</html>
