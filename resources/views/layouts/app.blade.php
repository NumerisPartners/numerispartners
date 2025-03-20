<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Numeris Partners') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/custom.css') }}">
        <link rel="stylesheet" href="{{ mix('css/main.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
      
    </head>
    <body class="antialiased home-14">
        <div class="min-h-screen">
            <!-- Header -->
            @include('layouts.header')

            <!-- Page Heading -->
            @isset($header)
                <div class="breadcrumb-area bg-relative" style="background-image: url('{{ asset('images/bg/breadcrumb.png') }}')">
                    <div class="banner-bg-img"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-8">
                                <div class="breadcrumb-inner text-center">
                                    <h2>{{ $header }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset

            <!-- Page Content -->
            <main>
                @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
      
    </body>
</html>
