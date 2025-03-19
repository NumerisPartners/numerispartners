@extends('layouts.app')

@section('title', 'À propos')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">À propos de nous</h1>
            <p class="text-xl max-w-3xl mx-auto">Découvrez qui nous sommes et comment nous pouvons vous aider à réussir dans le monde digital.</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <h2 class="text-3xl font-bold mb-4 text-indigo-600">Notre histoire</h2>
                    <p class="text-gray-700 mb-4">Fondée en 2020, Numeris Partners est née de la passion de ses fondateurs pour les technologies numériques et leur potentiel à transformer les entreprises.</p>
                    <p class="text-gray-700 mb-4">Notre mission est simple : aider les entreprises à réussir dans l'ère numérique en leur fournissant des solutions digitales innovantes et sur mesure.</p>
                    <p class="text-gray-700">Depuis notre création, nous avons accompagné de nombreuses entreprises dans leur transformation digitale et avons développé une expertise reconnue dans le domaine du développement web et mobile.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="https://placehold.co/600x400/indigo/white?text=Notre+Histoire" alt="Notre Histoire" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Nos valeurs</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Nos valeurs guident chacune de nos actions et nous permettent de délivrer un service d'excellence à nos clients.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Excellence</h3>
                    <p class="text-gray-600">Nous nous efforçons de délivrer un travail de la plus haute qualité, en respectant les délais et les budgets.</p>
                </div>
                
                <!-- Value 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Collaboration</h3>
                    <p class="text-gray-600">Nous travaillons en étroite collaboration avec nos clients pour comprendre leurs besoins et leur offrir des solutions adaptées.</p>
                </div>
                
                <!-- Value 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                    <p class="text-gray-600">Nous restons à la pointe de la technologie pour offrir des solutions innovantes qui répondent aux défis d'aujourd'hui et de demain.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Notre équipe</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Découvrez les talents qui font de Numeris Partners une entreprise d'exception.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center">
                    <img src="https://placehold.co/200x200/indigo/white?text=CEO" alt="CEO" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-1">Jean Dupont</h3>
                    <p class="text-indigo-600 mb-3">CEO & Fondateur</p>
                    <p class="text-gray-600">Passionné de technologie avec plus de 15 ans d'expérience dans le développement web et la gestion de projets digitaux.</p>
                </div>
                
                <!-- Team Member 2 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center">
                    <img src="https://placehold.co/200x200/indigo/white?text=CTO" alt="CTO" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-1">Marie Martin</h3>
                    <p class="text-indigo-600 mb-3">CTO</p>
                    <p class="text-gray-600">Experte en développement logiciel et architectures cloud, Marie dirige notre équipe technique avec passion et rigueur.</p>
                </div>
                
                <!-- Team Member 3 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center">
                    <img src="https://placehold.co/200x200/indigo/white?text=Designer" alt="Designer" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-1">Luc Bernard</h3>
                    <p class="text-indigo-600 mb-3">Directeur Créatif</p>
                    <p class="text-gray-600">Designer UX/UI talentueux, Luc crée des expériences utilisateur exceptionnelles qui font la différence.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    @include('components.cta-section')

@endsection
