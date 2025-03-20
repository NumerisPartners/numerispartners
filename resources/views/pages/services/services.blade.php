@extends('layouts.app')

@section('title', 'Nos Services')

@section('content')
   <!-- page title start -->
   <x-breadcrumb title="Nos Services" />
    <section class="py-16 ">
        <div class="flex flex-col items-center justify-center mx-auto px-4 text-center">
            <p class="text-3xl font-bold max-w-2xl mx-auto">Découvrez notre gamme complète de services digitaux conçus pour propulser votre entreprise vers de nouveaux sommets.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            @include('pages.services.partials.our-services')
            <!-- Web Development -->
            <div id="web" class="mb-16 scroll-mt-20">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                        <h2 class="text-3xl font-bold mb-4 text-indigo-600">Développement Web</h2>
                        <p class="text-gray-700 mb-4">Nous créons des sites web et des applications web sur mesure qui répondent parfaitement à vos besoins et à ceux de vos utilisateurs.</p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Sites vitrines professionnels et modernes</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Plateformes e-commerce performantes</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Applications web complexes et sur mesure</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Optimisation SEO et performances</span>
                            </li>
                        </ul>
                    </div>
                    <div class="md:w-1/2">
                        <img src="https://placehold.co/600x400/indigo/white?text=Web+Development" alt="Développement Web" class="rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
            
            <!-- Mobile Development -->
            <div id="mobile" class="mb-16 scroll-mt-20">
                <div class="flex flex-col md:flex-row-reverse items-center">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pl-8">
                        <h2 class="text-3xl font-bold mb-4 text-indigo-600">Applications Mobiles</h2>
                        <p class="text-gray-700 mb-4">Nous développons des applications mobiles natives et cross-platform qui offrent une expérience utilisateur exceptionnelle.</p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Applications iOS (iPhone et iPad)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Applications Android</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Solutions cross-platform (React Native, Flutter)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Maintenance et mises à jour continues</span>
                            </li>
                        </ul>
                    </div>
                    <div class="md:w-1/2">
                        <img src="https://placehold.co/600x400/indigo/white?text=Mobile+Apps" alt="Applications Mobiles" class="rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
            
            <!-- UX/UI Design -->
            <div id="design" class="mb-16 scroll-mt-20">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                        <h2 class="text-3xl font-bold mb-4 text-indigo-600">Design UX/UI</h2>
                        <p class="text-gray-700 mb-4">Nous concevons des interfaces utilisateur intuitives et esthétiques qui améliorent l'expérience utilisateur et augmentent l'engagement.</p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Recherche utilisateur et personas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Wireframing et prototypage</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Design d'interface utilisateur</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Tests utilisateurs et optimisation</span>
                            </li>
                        </ul>
                    </div>
                    <div class="md:w-1/2">
                        <img src="https://placehold.co/600x400/indigo/white?text=UX/UI+Design" alt="Design UX/UI" class="rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
            
            <!-- Digital Consulting -->
            <div id="consulting" class="scroll-mt-20">
                <div class="flex flex-col md:flex-row-reverse items-center">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pl-8">
                        <h2 class="text-3xl font-bold mb-4 text-indigo-600">Conseil Digital</h2>
                        <p class="text-gray-700 mb-4">Nous vous accompagnons dans votre transformation digitale avec des conseils stratégiques et des solutions adaptées à vos besoins.</p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Stratégie digitale</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Transformation digitale</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Audit et optimisation de solutions existantes</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Formation et accompagnement des équipes</span>
                            </li>
                        </ul>
                    </div>
                    <div class="md:w-1/2">
                        <img src="https://placehold.co/600x400/indigo/white?text=Digital+Consulting" alt="Conseil Digital" class="rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
     @include('pages.services.partials.our-process')

    <!-- CTA Section -->
    @include('components.cta-section')
    
@endsection
