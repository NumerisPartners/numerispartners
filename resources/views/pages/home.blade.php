@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Solutions digitales innovantes</h1>
                    <p class="text-xl mb-8">Transformez votre entreprise avec nos services numériques sur mesure.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('services') }}" class="bg-white text-indigo-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition inline-block text-center">Nos services</a>
                        <a href="{{ route('contact.index') }}" class="border-2 border-white text-white hover:bg-white hover:text-indigo-600 px-6 py-3 rounded-lg font-semibold transition inline-block text-center">Contactez-nous</a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="https://placehold.co/600x400/indigo/white?text=Numeris+Partners" alt="Numeris Partners" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Nos services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Découvrez comment nous pouvons vous aider à atteindre vos objectifs numériques avec notre gamme complète de services.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="bg-indigo-100 text-indigo-600 w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Développement Web</h3>
                    <p class="text-gray-600 text-center">Sites vitrines, applications web et e-commerce sur mesure pour votre entreprise.</p>
                </div>
                
                <!-- Service 2 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="bg-indigo-100 text-indigo-600 w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Applications Mobiles</h3>
                    <p class="text-gray-600 text-center">Applications iOS et Android performantes et intuitives pour vos utilisateurs.</p>
                </div>
                
                <!-- Service 3 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="bg-indigo-100 text-indigo-600 w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Design UX/UI</h3>
                    <p class="text-gray-600 text-center">Interfaces utilisateur modernes et expériences utilisateur optimisées.</p>
                </div>
                
                <!-- Service 4 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="bg-indigo-100 text-indigo-600 w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Conseil Digital</h3>
                    <p class="text-gray-600 text-center">Stratégies digitales et accompagnement pour votre transformation numérique.</p>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('services') }}" class="inline-block bg-indigo-600 text-white hover:bg-indigo-700 px-6 py-3 rounded-lg font-semibold transition">Tous nos services</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Pourquoi nous choisir ?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Nous nous engageons à fournir des solutions digitales de haute qualité qui répondent parfaitement à vos besoins.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Solutions rapides</h3>
                    <p class="text-gray-600">Nous livrons des projets de qualité dans des délais optimisés pour répondre à vos besoins urgents.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Sécurité garantie</h3>
                    <p class="text-gray-600">La sécurité de vos données et de vos applications est notre priorité absolue.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Équipe d'experts</h3>
                    <p class="text-gray-600">Notre équipe de professionnels expérimentés est dédiée à la réussite de votre projet.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Prêt à transformer votre présence digitale ?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Contactez-nous dès aujourd'hui pour discuter de votre projet et découvrir comment nous pouvons vous aider à atteindre vos objectifs.</p>
            <a href="{{ route('contact.index') }}" class="bg-white text-indigo-600 hover:bg-gray-100 px-8 py-4 rounded-lg font-semibold text-lg transition inline-block">Démarrer votre projet</a>
        </div>
    </section>
@endsection
