@extends('layouts.app')

@section('title', 'Nos Services')

@section('content')
   <!-- page title start -->
   <x-breadcrumb title="Nos Services" />
    <section class="py-16 bg-white dark:bg-[#050231]">
        <div class="flex flex-col items-center justify-center mx-auto px-4 text-center">
            <p class="text-3xl font-bold max-w-2xl mx-auto dark:text-white">Découvrez notre gamme complète de services digitaux conçus pour propulser votre entreprise vers de nouveaux sommets.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-white dark:bg-[#050231]">
        <div class="container mx-auto px-4">
            @include('pages.services.partials.our-services')
        </div>
    </section>

    <!-- Process Section -->
     @include('pages.services.partials.our-process')

    <!-- CTA Section -->
    @include('components.cta-section')
    
@endsection
