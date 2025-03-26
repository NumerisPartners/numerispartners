@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <!-- Hero Section -->
    @include('pages.home.partials.hero')

    <!-- About Us Section -->
    @include('pages.home.partials.about-us')

    <!-- Services Preview Section -->
    @include('pages.home.partials.services')

    <!-- CTA Section -->
    @include('components.cta-section')

    <!-- Why Choose Us Section -->
    @include('pages.about.partials.choose')

    <!-- Blog Section -->
    @include('pages.home.partials.blog')

  
@endsection
