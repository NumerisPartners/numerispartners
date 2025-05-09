<x-app-layout>
    <x-breadcrumb title="Modifier la formation" />

    <div class="container">
     
            <div class="flex justify-between items-center mb-3 mt-3">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Modifier la formation') }}
                </h2>
                <a href="{{ route('admin.trainings.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    {{ __('Retour à la liste') }}
                </a>
            </div>
     

        <div class="py-12">
            <div class="bg-[#f8f9fc] dark:bg-[#150443] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.trainings.update', $training) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- Titre -->
                            <div>
                                <x-input-label class="dark:text-white" for="title" :value="__('Titre')" />
                                <x-text-input id="title" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="text" name="title" :value="old('title', $training->title)" required autofocus />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Image -->
                            <div>
                                <x-input-label class="dark:text-white" for="image" :value="__('Image')" />
                                @if($training->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $training->image) }}" alt="{{ $training->title }}" class="h-20 w-auto">
                                    </div>
                                @endif
                                <input id="image" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="file" name="image" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>

                            <!-- Prix particulier -->
                            <div>
                                <x-input-label class="dark:text-white" for="individual_price" :value="__('Prix particulier (€)')" />
                                <x-text-input id="individual_price" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="number" name="individual_price" :value="old('individual_price', $training->individual_price)" step="0.01" min="0" required />
                                <x-input-error :messages="$errors->get('individual_price')" class="mt-2" />
                            </div>

                            <!-- Prix entreprise -->
                            <div>
                                <x-input-label class="dark:text-white" for="company_price" :value="__('Prix entreprise (€)')" />
                                <x-text-input id="company_price" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="number" name="company_price" :value="old('company_price', $training->company_price)" step="0.01" min="0" required />
                                <x-input-error :messages="$errors->get('company_price')" class="mt-2" />
                            </div>

                            <!-- Durée -->
                            <div>
                                <x-input-label class="dark:text-white" for="duration" :value="__('Durée')" />
                                <x-text-input id="duration" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300" type="text" name="duration" :value="old('duration', $training->duration)" placeholder="Ex: 3 jours, 21 heures" required />
                                <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                            </div>

                            <!-- Niveau -->
                            <div>
                                <x-input-label class="dark:text-white" for="level" :value="__('Niveau')" />
                                <select id="level" name="level" class="block mt-1 w-full px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="débutant" {{ old('level', $training->level) == 'débutant' ? 'selected' : '' }}>Débutant</option>
                                    <option value="intermédiaire" {{ old('level', $training->level) == 'intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
                                    <option value="avancé" {{ old('level', $training->level) == 'avancé' ? 'selected' : '' }}>Avancé</option>
                                </select>
                                <x-input-error :messages="$errors->get('level')" class="mt-2" />
                            </div>

                            <!-- Statut -->
                            <div class="flex items-center mt-4">
                                <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $training->is_active) ? 'checked' : '' }} class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                                <label for="is_active" class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Formation active') }}</label>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <x-input-label class="dark:text-white" for="description" :value="__('Description courte | Objectifs')" />
                            <textarea id="description" name="description" rows="3" class="block mt-1 w-full px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>{{ old('description', $training->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Contenu -->
                        <div class="mb-6">
                            <x-input-label class="dark:text-white" for="content" :value="__('Contenu détaillé')" />
                            <textarea id="content" name="content" rows="10" class="block mt-1 w-full px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('content', $training->content) }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <!-- Informations pratiques -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mb-4">{{ __('Informations pratiques') }}</h3>
                            
                            <!-- Public cible -->
                            <div class="mb-4">
                                <x-input-label class="dark:text-white" for="target_audience" :value="__('Public cible')" />
                                <textarea id="target_audience" name="target_audience" rows="3" class="block mt-1 w-full px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('target_audience', $training->target_audience) }}</textarea>
                                <x-input-error :messages="$errors->get('target_audience')" class="mt-2" />
                            </div>
                            
                            <!-- Prérequis -->
                            <div class="mb-4">
                                <x-input-label class="dark:text-white" for="prerequisites" :value="__('Prérequis')" />
                                <textarea id="prerequisites" name="prerequisites" rows="3" class="block mt-1 w-full px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('prerequisites', $training->prerequisites) }}</textarea>
                                <x-input-error :messages="$errors->get('prerequisites')" class="mt-2" />
                            </div>
                            
                            <!-- Méthodes pédagogiques -->
                            <div class="mb-4">
                                <x-input-label class="dark:text-white" for="teaching_methods" :value="__('Méthodes pédagogiques')" />
                                <textarea id="teaching_methods" name="teaching_methods" rows="3" class="block mt-1 w-full px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('teaching_methods', $training->teaching_methods) }}</textarea>
                                <x-input-error :messages="$errors->get('teaching_methods')" class="mt-2" />
                            </div>
                            
                            <!-- Modalités d'évaluation -->
                            <div class="mb-4">
                                <x-input-label class="dark:text-white" for="evaluation_methods" :value="__('Modalités d\'évaluation')" />
                                <textarea id="evaluation_methods" name="evaluation_methods" rows="3" class="block mt-1 w-full px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('evaluation_methods', $training->evaluation_methods) }}</textarea>
                                <x-input-error :messages="$errors->get('evaluation_methods')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Mettre à jour la formation') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
