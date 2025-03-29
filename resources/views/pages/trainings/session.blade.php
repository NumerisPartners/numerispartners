<x-guest-layout>
    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="mb-6">
                            <a href="{{ route('trainings.show', $training) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Retour à la formation
                            </a>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 dark:bg-green-900/20 dark:border-green-500 dark:text-green-300" role="alert">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 dark:bg-red-900/20 dark:border-red-500 dark:text-red-300" role="alert">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Colonne de gauche avec infos de session -->
                            <div class="lg:col-span-1">
                                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Détails de la session</h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400">Dates</span>
                                            <span class="font-medium text-gray-900 dark:text-white">
                                                {{ $session->start_date->format('d/m/Y') }}
                                                @if($session->start_date->format('d/m/Y') != $session->end_date->format('d/m/Y'))
                                                    - {{ $session->end_date->format('d/m/Y') }}
                                                @endif
                                            </span>
                                        </div>
                                        
                                        @if($session->start_time && $session->end_time)
                                            <div>
                                                <span class="block text-sm text-gray-500 dark:text-gray-400">Horaires</span>
                                                <span class="font-medium text-gray-900 dark:text-white">
                                                    {{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}
                                                </span>
                                            </div>
                                        @endif
                                        
                                        <div>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400">Durée</span>
                                            <span class="font-medium text-gray-900 dark:text-white">{{ $session->getDurationInDays() }} jour(s)</span>
                                        </div>
                                        
                                        <div>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400">Lieu</span>
                                            <span class="font-medium text-gray-900 dark:text-white">{{ $session->location }}</span>
                                            @if($session->address)
                                                <span class="block text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $session->address }}</span>
                                            @endif
                                        </div>
                                        
                                        <div>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400">Places disponibles</span>
                                            @if($session->isFull())
                                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300">
                                                    Complet
                                                </span>
                                            @else
                                                <span class="font-medium text-gray-900 dark:text-white">
                                                    {{ $session->available_seats }} / {{ $session->max_participants }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6 mb-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Tarifs</h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400">Particulier</span>
                                            <span class="text-xl font-bold text-gray-900 dark:text-white">{{ number_format($training->individual_price, 2, ',', ' ') }} €</span>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400">TTC par personne</span>
                                        </div>
                                        
                                        <div>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400">Entreprise</span>
                                            <span class="text-xl font-bold text-gray-900 dark:text-white">{{ number_format($training->company_price, 2, ',', ' ') }} €</span>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400">HT par personne</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Intéressé(e) par cette session ?</h3>
                                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                                        Inscrivez-vous directement en ligne ou contactez-nous pour plus d'informations.
                                    </p>
                                    
                                    @if($session->isPast())
                                        <div class="inline-block w-full text-center px-4 py-2 bg-gray-400 text-white rounded cursor-not-allowed">
                                            Session terminée
                                        </div>
                                    @elseif($session->isFull())
                                        <div class="inline-block w-full text-center px-4 py-2 bg-gray-400 text-white rounded cursor-not-allowed">
                                            Session complète
                                        </div>
                                    @else
                                        <a href="{{ route('trainings.register', ['training' => $training->slug, 'session' => $session->id]) }}" class="inline-block w-full text-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                            S'inscrire à cette session
                                        </a>
                                    @endif
                                    
                                    <div class="mt-4 text-center">
                                        <a href="{{ route('contact.index') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                            Besoin d'informations supplémentaires ?
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Colonne de droite avec détails de la formation -->
                            <div class="lg:col-span-2">
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $training->title }}</h1>
                                <h2 class="text-xl text-gray-600 dark:text-gray-400 mb-6">Session du {{ $session->start_date->format('d/m/Y') }}</h2>
                                
                                <div class="prose dark:prose-invert max-w-none mb-8">
                                    <h3 class="text-xl font-semibold mb-2">Description de la formation</h3>
                                    <p class="mb-4">{{ $training->description }}</p>
                                    
                                    @if($training->content)
                                        <h3 class="text-xl font-semibold mb-2">Programme détaillé</h3>
                                        <div class="mb-8">
                                            {!! nl2br(e($training->content)) !!}
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-8">
                                    <h3 class="text-xl font-semibold mb-4">Informations pratiques</h3>
                                    
                                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="font-medium text-gray-900 dark:text-white mb-2">Public cible</h4>
                                                <p class="text-gray-600 dark:text-gray-400">
                                                    Cette formation s'adresse aux professionnels souhaitant développer leurs compétences dans ce domaine, quel que soit leur niveau initial.
                                                </p>
                                            </div>
                                            
                                            <div>
                                                <h4 class="font-medium text-gray-900 dark:text-white mb-2">Prérequis</h4>
                                                <p class="text-gray-600 dark:text-gray-400">
                                                    Niveau {{ $training->level }}. Consultez-nous pour plus de détails sur les prérequis spécifiques.
                                                </p>
                                            </div>
                                            
                                            <div>
                                                <h4 class="font-medium text-gray-900 dark:text-white mb-2">Méthodes pédagogiques</h4>
                                                <p class="text-gray-600 dark:text-gray-400">
                                                    Alternance de théorie et de pratique, exercices concrets, études de cas, mises en situation professionnelle.
                                                </p>
                                            </div>
                                            
                                            <div>
                                                <h4 class="font-medium text-gray-900 dark:text-white mb-2">Modalités d'évaluation</h4>
                                                <p class="text-gray-600 dark:text-gray-400">
                                                    Évaluation continue pendant la formation, quiz, exercices pratiques et mise en situation.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-center mt-8">
                                    @if($session->isPast())
                                        <div class="inline-block px-6 py-3 bg-gray-400 text-white rounded-lg cursor-not-allowed">
                                            Session terminée
                                        </div>
                                    @elseif($session->isFull())
                                        <div class="inline-block px-6 py-3 bg-gray-400 text-white rounded-lg cursor-not-allowed">
                                            Session complète
                                        </div>
                                    @else
                                        <a href="{{ route('trainings.register', ['training' => $training->slug, 'session' => $session->id]) }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                            S'inscrire à cette formation
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</x-guest-layout>
