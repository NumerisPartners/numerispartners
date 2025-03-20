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
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="home-14 antialiased">
        <!-- Header -->
        @include('layouts.header')

        <!-- Breadcrumb -->
        <div class="breadcrumb-area bg-relative" style="background-image: url('{{ asset('images/bg/breadcrumb.png') }}')">
            <div class="banner-bg-img"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="breadcrumb-inner text-center">
                            <h2>{{ isset($title) ? $title : 'Authentification' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Auth Content -->
        <div class="service-area pd-top-120 pd-bottom-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="single-blog-inner style-2">
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

     
    </body>
</html>
