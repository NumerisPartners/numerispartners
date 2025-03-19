@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <!-- Hero Section -->
    @include('pages.home.partials.hero')

    <!-- About Us Section -->
    @include('pages.home.partials.about-us')

    <!-- Services Preview Section -->
    @include('pages.home.partials.services')

    <!-- Why Choose Us Section -->
    @include('pages.home.partials.choose')

    <!-- CTA Section -->
    @include('components.cta-section')
@endsection
