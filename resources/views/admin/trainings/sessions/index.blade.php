<x-app-layout>
    <x-breadcrumb title="Ajouter une session" />

    <div class="container">

        <div class="flex justify-between items-center mb-3 mt-3">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Sessions pour') }}: {{ $training->title }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.trainings.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    {{ __('Retour aux formations') }}
                </a>
                <a href="{{ route('admin.trainings.sessions.create', $training) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    {{ __('Nouvelle session') }}
                </a>
            </div>
        </div>
   

    <div class="py-12">
        
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-lg font-medium">{{ __('Détails de la formation') }}</h3>
                        <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <span class="block text-sm text-gray-500 dark:text-gray-400">{{ __('Prix particulier') }}</span>
                                <span class="font-medium">{{ number_format($training->individual_price, 2, ',', ' ') }} €</span>
                            </div>
                            <div>
                                <span class="block text-sm text-gray-500 dark:text-gray-400">{{ __('Prix entreprise') }}</span>
                                <span class="font-medium">{{ number_format($training->company_price, 2, ',', ' ') }} €</span>
                            </div>
                            <div>
                                <span class="block text-sm text-gray-500 dark:text-gray-400">{{ __('Durée') }}</span>
                                <span class="font-medium">{{ $training->duration }}</span>
                            </div>
                        </div>
                    </div>

                    @if($sessions->isEmpty())
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400">{{ __('Aucune session disponible pour cette formation.') }}</p>
                            <a href="{{ route('admin.trainings.sessions.create', $training) }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                {{ __('Créer une session') }}
                            </a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Dates') }}</th>
                                        <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Horaires') }}</th>
                                        <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Lieu') }}</th>
                                        <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Places') }}</th>
                                        <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Statut') }}</th>
                                        <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                    @foreach($sessions as $session)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $session->start_date->format('d/m/Y') }}
                                                    @if($session->start_date->format('d/m/Y') != $session->end_date->format('d/m/Y'))
                                                        - {{ $session->end_date->format('d/m/Y') }}
                                                    @endif
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $session->getDurationInDays() }} {{ __('jour(s)') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                @if($session->start_time && $session->end_time)
                                                    {{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}
                                                @else
                                                    {{ __('Non spécifié') }}
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $session->location }}</div>
                                                @if($session->address)
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $session->address }}</div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $session->available_seats }} / {{ $session->max_participants }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($session->isPast())
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        {{ __('Terminée') }}
                                                    </span>
                                                @elseif($session->isOngoing())
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        {{ __('En cours') }}
                                                    </span>
                                                @elseif($session->is_confirmed)
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ __('Confirmée') }}
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        {{ __('En attente') }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.trainings.sessions.edit', [$training, $session]) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">{{ __('Modifier') }}</a>
                                                    <form action="{{ route('admin.trainings.sessions.destroy', [$training, $session]) }}" method="POST" onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette session ?') }}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">{{ __('Supprimer') }}</button>
                                                    </form>
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
</x-app-layout>
