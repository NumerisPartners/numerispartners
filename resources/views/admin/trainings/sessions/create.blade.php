<x-app-layout>
    <div class="container">
       
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Ajouter une session pour') }}: {{ $training->title }}
                </h2>
                <a href="{{ route('admin.trainings.sessions.index', $training) }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    {{ __('Retour aux sessions') }}
                </a>
            </div>
       

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('admin.trainings.sessions.store', $training) }}" method="POST">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <!-- Date de début -->
                                <div>
                                    <x-input-label for="start_date" :value="__('Date de début')" />
                                    <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                                </div>

                                <!-- Date de fin -->
                                <div>
                                    <x-input-label for="end_date" :value="__('Date de fin')" />
                                    <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required />
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                                </div>

                                <!-- Heure de début -->
                                <div>
                                    <x-input-label for="start_time" :value="__('Heure de début')" />
                                    <x-text-input id="start_time" class="block mt-1 w-full" type="time" name="start_time" :value="old('start_time')" />
                                    <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                                </div>

                                <!-- Heure de fin -->
                                <div>
                                    <x-input-label for="end_time" :value="__('Heure de fin')" />
                                    <x-text-input id="end_time" class="block mt-1 w-full" type="time" name="end_time" :value="old('end_time')" />
                                    <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                                </div>

                                <!-- Lieu -->
                                <div>
                                    <x-input-label for="location" :value="__('Lieu')" />
                                    <select id="location" name="location" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                        <option value="">{{ __('Sélectionnez un lieu') }}</option>
                                        <option value="En ligne" {{ old('location') == 'En ligne' ? 'selected' : '' }}>{{ __('En ligne') }}</option>
                                        <option value="Présentiel" {{ old('location') == 'Présentiel' ? 'selected' : '' }}>{{ __('Présentiel') }}</option>
                                        <option value="Hybride" {{ old('location') == 'Hybride' ? 'selected' : '' }}>{{ __('Hybride') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                </div>

                                <!-- Adresse -->
                                <div>
                                    <x-input-label for="address" :value="__('Adresse (si présentiel)')" />
                                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>

                                <!-- Nombre maximum de participants -->
                                <div>
                                    <x-input-label for="max_participants" :value="__('Nombre maximum de participants')" />
                                    <x-text-input id="max_participants" class="block mt-1 w-full" type="number" name="max_participants" :value="old('max_participants', 10)" min="1" required />
                                    <x-input-error :messages="$errors->get('max_participants')" class="mt-2" />
                                </div>

                                <!-- Session confirmée -->
                                <div class="flex items-center mt-4">
                                    <input id="is_confirmed" type="checkbox" name="is_confirmed" value="1" {{ old('is_confirmed') ? 'checked' : '' }} class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                                    <label for="is_confirmed" class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Session confirmée') }}</label>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Créer la session') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
