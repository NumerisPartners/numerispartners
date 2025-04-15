<x-app-layout>
    <x-breadcrumb title="Détails de la formation" />
    <div class="container">
        <div class="py-12">
            <div class="bg-white dark:bg-[#150443] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <a href="{{ route('trainings.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Retour aux formations
                        </a>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Colonne de gauche avec image et infos -->
                        <div class="lg:col-span-1">
                            @if($training->image)
                                <img src="{{ asset('storage/' . $training->image) }}" alt="{{ $training->title }}" class="w-full h-auto rounded-lg mb-6">
                            @else
                                <div class="w-full h-64 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center mb-6">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                    </svg>
                                </div>
                            @endif

                            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informations</h3>
                                
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">Durée:</span>
                                        <span class="font-medium text-gray-900 dark:text-white">{{ $training->duration }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">Niveau:</span>
                                        <span class="font-medium text-gray-900 dark:text-white">{{ $training->level }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">Prix particulier:</span>
                                        <span class="font-medium text-gray-900 dark:text-white">{{ number_format($training->individual_price, 2, ',', ' ') }} €</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">Prix entreprise:</span>
                                        <span class="font-medium text-gray-900 dark:text-white">{{ number_format($training->company_price, 2, ',', ' ') }} €</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Besoin d'informations ?</h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-4">
                                    Contactez-nous pour plus d'informations sur cette formation ou pour une demande personnalisée.
                                </p>
                                <a href="{{ route('contact.index') }}" class="inline-block w-full text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                    Nous contacter
                                </a>
                            </div>
                        </div>

                        <!-- Colonne de droite avec description et sessions -->
                        <div class="lg:col-span-2">
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $training->title }}</h1>
                            
                            <div class="prose dark:prose-invert max-w-none mb-8">
                                <h2 class="text-xl font-semibold mb-2 dark:text-white">Description</h2>
                                <p class="mb-4">{{ $training->description }}</p>
                                
                                @if($training->content)
                                    <h2 class="text-xl font-semibold mb-2 dark:text-white">Contenu détaillé</h2>
                                    <div class="mb-8">
                                        {!! nl2br(e($training->content)) !!}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-8">
                                <h2 class="text-xl font-semibold mb-4">Sessions à venir</h2>
                                
                                @if($upcomingSessions->isEmpty())
                                    <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                                        <p class="text-yellow-800 dark:text-yellow-200">
                                            Aucune session n'est programmée pour le moment. Contactez-nous pour connaître les prochaines dates.
                                        </p>
                                    </div>
                                @else
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Dates</th>
                                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Lieu</th>
                                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Places</th>
                                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                                @foreach($upcomingSessions as $session)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                                {{ $session->start_date->format('d/m/Y') }}
                                                                @if($session->start_date->format('d/m/Y') != $session->end_date->format('d/m/Y'))
                                                                    - {{ $session->end_date->format('d/m/Y') }}
                                                                @endif
                                                            </div>
                                                            @if($session->start_time && $session->end_time)
                                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                                    {{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $session->location }}</div>
                                                            @if($session->address)
                                                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $session->address }}</div>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            @if($session->isFull())
                                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300">
                                                                    Complet
                                                                </span>
                                                            @else
                                                                <span class="text-sm text-gray-900 dark:text-white">
                                                                    {{ $session->available_seats }} places disponibles
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <a href="{{ route('trainings.session', [$training, $session]) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                                                Détails
                                                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
