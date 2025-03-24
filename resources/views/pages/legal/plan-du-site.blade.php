<x-app-layout>
    @section('title', 'Plan du site')
    <x-breadcrumb title="Plan du site" />

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="details">
                        <h2 class="mb-6 text-2xl font-bold dark:text-white">Plan du site</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <!-- Pages principales -->
                            <div class="mb-8">
                                <h3 class="text-xl font-bold mb-4 text-indigo-600 dark:text-white">Pages principales</h3>
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Accueil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('services') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Nos services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> À propos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Contact
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Espace membre -->
                            <div class="mb-8">
                                <h3 class="text-xl font-bold mb-4 text-indigo-600 dark:text-white">Espace membre</h3>
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Connexion
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Inscription
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Services -->
                            <div class="mb-8">
                                <h3 class="text-xl font-bold mb-4 text-indigo-600 dark:text-white">Nos services</h3>
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('services') }}#expertises" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Expertises
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('services') }}#consultancy" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Conseil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('services') }}#trainings" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Formations
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Informations légales -->
                            <div class="mb-8">
                                <h3 class="text-xl font-bold mb-4 text-indigo-600 dark:text-white">Informations légales</h3>
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('legal.mentions-legales') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Mentions légales
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('legal.politique-confidentialite') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Politique de confidentialité
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('legal.plan-du-site') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                                            <i class="fas fa-angle-right mr-2"></i> Plan du site
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
