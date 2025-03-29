<x-app-layout>

    <div class="container">
       
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Gestion des formations') }}
                </h2>
                <a href="{{ route('admin.trainings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    {{ __('Nouvelle formation') }}
                </a>
            </div>
       

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Filtres et recherche -->
                        <div class="mb-6 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <form action="{{ route('admin.trainings.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Recherche</label>
                                    <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        placeholder="Titre ou description...">
                                </div>
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Statut</label>
                                    <select name="status" id="status" 
                                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Tous les statuts</option>
                                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Actif</option>
                                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactif</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="sort" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Trier par</label>
                                    <select name="sort" id="sort" 
                                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Titre</option>
                                        <option value="individual_price" {{ request('sort') == 'individual_price' ? 'selected' : '' }}>Prix particulier</option>
                                        <option value="company_price" {{ request('sort') == 'company_price' ? 'selected' : '' }}>Prix entreprise</option>
                                        <option value="created_at" {{ request('sort', 'created_at') == 'created_at' ? 'selected' : '' }}>Date de création</option>
                                    </select>
                                </div>
                                <div class="flex items-end">
                                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition w-full">
                                        {{ __('Filtrer') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                        @if($trainings->isEmpty())
                            <div class="text-center py-8">
                                <p class="text-gray-500 dark:text-gray-400">{{ __('Aucune formation disponible.') }}</p>
                                <a href="{{ route('admin.trainings.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                    {{ __('Créer une formation') }}
                                </a>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Titre') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Prix particulier') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Prix entreprise') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Durée') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Statut') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Sessions') }}</th>
                                            <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                        @foreach($trainings as $training)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        @if($training->image)
                                                            <div class="flex-shrink-0 h-10 w-10 mr-3">
                                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $training->image) }}" alt="{{ $training->title }}">
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $training->title }}</div>
                                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($training->description, 50) }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ number_format($training->individual_price, 2, ',', ' ') }} €</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ number_format($training->company_price, 2, ',', ' ') }} €</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $training->duration }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $training->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $training->is_active ? __('Actif') : __('Inactif') }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('admin.trainings.sessions.index', $training) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                        {{ $training->sessions->count() }} {{ __('sessions') }}
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('admin.trainings.edit', $training) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">{{ __('Modifier') }}</a>
                                                        <a href="{{ route('admin.trainings.sessions.index', $training) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">{{ __('Sessions') }}</a>
                                                        
                                                        <!-- Bouton de duplication -->
                                                        <form action="{{ route('admin.trainings.duplicate', $training) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">{{ __('Dupliquer') }}</button>
                                                        </form>
                                                        
                                                        <form action="{{ route('admin.trainings.destroy', $training) }}" method="POST" onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette formation ?') }}')">
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
                            
                            <!-- Pagination -->
                            <div class="mt-4">
                                {{ $trainings->appends(request()->query())->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
