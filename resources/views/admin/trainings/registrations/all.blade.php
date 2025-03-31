<x-app-layout>

    <x-breadcrumb title="Toutes les inscriptions aux formations" />

    <div class="container">

        <div class="flex justify-between items-center mb-4 pt-3">
           
            <div class="flex space-x-2">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    {{ __('Retour au tableau de bord') }}
                </a>
                <a href="{{ route('admin.trainings.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    {{ __('Gérer les formations') }}
                </a>
            </div>
        </div>

        <div class="py-12">
            <div class="">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-medium mb-4">{{ __('Filtrer les inscriptions') }}</h3>
                        
                        <form action="{{ route('admin.registrations.index') }}" method="GET" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Filtre par formation -->
                                <div>
                                    <label for="training_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Formation') }}</label>
                                    <select id="training_id" name="training_id" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">{{ __('Toutes les formations') }}</option>
                                        @foreach($trainings as $training)
                                            <option value="{{ $training->id }}" {{ $trainingId == $training->id ? 'selected' : '' }}>
                                                {{ $training->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <!-- Filtre par session -->
                                <div>
                                    <label for="session_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Session') }}</label>
                                    <select id="session_id" name="session_id" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">{{ __('Toutes les sessions') }}</option>
                                        @foreach($sessions as $session)
                                            <option value="{{ $session->id }}" {{ $sessionId == $session->id ? 'selected' : '' }}>
                                                {{ $session->start_date->format('d/m/Y') }}
                                                @if($session->start_date->format('d/m/Y') != $session->end_date->format('d/m/Y'))
                                                    - {{ $session->end_date->format('d/m/Y') }}
                                                @endif
                                                ({{ $session->location }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <!-- Filtre par statut -->
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Statut') }}</label>
                                    <select id="status" name="status" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">{{ __('Tous les statuts') }}</option>
                                        <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>{{ __('En attente') }}</option>
                                        <option value="confirmed" {{ $status === 'confirmed' ? 'selected' : '' }}>{{ __('Confirmée') }}</option>
                                        <option value="cancelled" {{ $status === 'cancelled' ? 'selected' : '' }}>{{ __('Annulée') }}</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Filtre par type -->
                                <div>
                                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Type d\'inscription') }}</label>
                                    <select id="type" name="type" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">{{ __('Tous les types') }}</option>
                                        <option value="individual" {{ $type === 'individual' ? 'selected' : '' }}>{{ __('Particulier') }}</option>
                                        <option value="company" {{ $type === 'company' ? 'selected' : '' }}>{{ __('Entreprise') }}</option>
                                    </select>
                                </div>
                                
                                <!-- Filtre par date de début -->
                                <div>
                                    <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Date d\'inscription (début)') }}</label>
                                    <input type="date" id="date_from" name="date_from" value="{{ $dateFrom }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                
                                <!-- Filtre par date de fin -->
                                <div>
                                    <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('Date d\'inscription (fin)') }}</label>
                                    <input type="date" id="date_to" name="date_to" value="{{ $dateTo }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                            
                            <div class="flex justify-between">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                                    {{ __('Filtrer') }}
                                </button>
                                <a href="{{ route('admin.registrations.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                                    {{ __('Réinitialiser') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-4">
                            <h3 class="text-lg font-medium">{{ __('Résultats') }} ({{ $registrations->count() }})</h3>
                        </div>

                        @if($registrations->isEmpty())
                            <div class="text-center py-8">
                                <p class="text-lg font-medium">{{ __('Aucune inscription trouvée.') }}</p>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Formation') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Session') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Utilisateur') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Date d\'inscription') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Type') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Statut') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                        @foreach($registrations as $registration)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        <a href="{{ route('admin.trainings.edit', $registration->session->training) }}" class="hover:underline">
                                                            {{ $registration->session->training->title }}
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        <a href="{{ route('admin.trainings.sessions.edit', [$registration->session->training, $registration->session]) }}" class="hover:underline">
                                                            {{ $registration->session->start_date->format('d/m/Y') }}
                                                            @if($registration->session->start_date->format('d/m/Y') != $registration->session->end_date->format('d/m/Y'))
                                                                - {{ $registration->session->end_date->format('d/m/Y') }}
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                                        {{ $registration->session->location }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        {{ $registration->user->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                                        {{ $registration->user->email }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                    {{ $registration->created_at->format('d/m/Y H:i') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                    @if($registration->is_company)
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                            {{ __('Entreprise') }}
                                                        </span>
                                                    @else
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                                            {{ __('Particulier') }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($registration->status === 'pending')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                            {{ __('En attente') }}
                                                        </span>
                                                    @elseif($registration->status === 'confirmed')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{ __('Confirmée') }}
                                                        </span>
                                                    @elseif($registration->status === 'cancelled')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            {{ __('Annulée') }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        @if($registration->status === 'pending')
                                                            <form action="{{ route('admin.registrations.confirm', $registration) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">{{ __('Confirmer') }}</button>
                                                            </form>
                                                        @endif
                                                        
                                                        @if($registration->status !== 'cancelled')
                                                            <form action="{{ route('admin.registrations.cancel', $registration) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">{{ __('Annuler') }}</button>
                                                            </form>
                                                        @endif
                                                    </div>
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
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mise à jour dynamique des sessions lorsque la formation change
            const trainingSelect = document.getElementById('training_id');
            const sessionSelect = document.getElementById('session_id');
            
            trainingSelect.addEventListener('change', function() {
                // Vider le select des sessions
                sessionSelect.innerHTML = '<option value="">{{ __('Toutes les sessions') }}</option>';
                
                if (this.value) {
                    // Récupérer les sessions de la formation sélectionnée via AJAX
                    fetch(`/api/trainings/${this.value}/sessions`)
                        .then(response => response.json())
                        .then(sessions => {
                            sessions.forEach(session => {
                                const startDate = new Date(session.start_date).toLocaleDateString('fr-FR');
                                const endDate = new Date(session.end_date).toLocaleDateString('fr-FR');
                                
                                const option = document.createElement('option');
                                option.value = session.id;
                                option.textContent = startDate === endDate 
                                    ? `${startDate} (${session.location})`
                                    : `${startDate} - ${endDate} (${session.location})`;
                                
                                sessionSelect.appendChild(option);
                            });
                        });
                }
            });
        });
    </script>
</x-app-layout>
