<x-app-layout>
   <x-breadcrumb title="Nos formations" />
    <div class="container">
        <div class="py-12">
            
                <div class="text-center mb-12">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Nos formations</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                        Découvrez nos formations professionnelles pour développer vos compétences et celles de vos équipes.
                    </p>
                </div>

                @if($trainings->isEmpty())
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-center text-gray-500 dark:text-gray-400">Aucune formation n'est disponible pour le moment.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($trainings as $training)
                            <div class="bg-white dark:bg-[#150443] overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                                <div class="relative">
                                    @if($training->image)
                                        <img src="{{ asset('storage/' . $training->image) }}" alt="{{ $training->title }}" class="w-full h-48 object-cover">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="absolute top-0 right-0 bg-blue-600 text-white px-3 py-1 m-2 rounded-full text-sm font-semibold">
                                        {{ $training->level }}
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $training->title }}</h2>
                                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($training->description, 100) }}</p>
                                    
                                    <div class="flex flex-wrap gap-4 mb-4">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $training->duration }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $training->sessions->count() }} sessions</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-between items-center mb-4">
                                        <div>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">À partir de</p>
                                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ number_format($training->individual_price, 2, ',', ' ') }} €</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Entreprises</p>
                                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ number_format($training->company_price, 2, ',', ' ') }} €</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="{{ route('trainings.show', $training) }}" class="inline-block w-full text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                            Voir les détails
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        
    </div>
</x-app-layout>
