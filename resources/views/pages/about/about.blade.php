@extends('layouts.app')

@section('title', 'À propos')

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="À propos" />

    <!-- About Section -->
   @include('pages.about.partials.historic')

    <!-- Values Section -->
   @include('pages.about.partials.choose')

    <!-- Team Section -->
   

    <!-- CTA Section -->
    @include('components.cta-section')

@endsection
