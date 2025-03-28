@extends('layouts.app')

@section('title', 'Gestion des projets clients')

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="Gestion des projets clients" />
    <!-- page title end -->

    <div class="py-12 md:py-16">
        <div class="container">
            <div class="bg-white dark:bg-[#150443] shadow-sm rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Liste des projets clients</h2>
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-base dark:text-white">
                            Retour au tableau de bord
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline dark:text-green-800">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Client
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Type de projet
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-[#050231] divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($projects as $project)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $project->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $project->name }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $project->email }}</div>
                                            @if($project->company)
                                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $project->company }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            @php
                                                $projectTypes = [
                                                    'site_web' => 'Site Web',
                                                    'application_mobile' => 'Application Mobile',
                                                    'e_commerce' => 'E-commerce',
                                                    'design_graphique' => 'Design Graphique',
                                                    'marketing_digital' => 'Marketing Digital',
                                                    'autre' => 'Autre'
                                                ];
                                            @endphp
                                            {{ $projectTypes[$project->project_type] ?? $project->project_type }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusClasses = [
                                                    'nouveau' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                                                    'en_discussion' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                                                    'en_cours' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300',
                                                    'terminé' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                                                    'annulé' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                                                ];
                                                $statusLabels = [
                                                    'nouveau' => 'Nouveau',
                                                    'en_discussion' => 'En discussion',
                                                    'en_cours' => 'En cours',
                                                    'terminé' => 'Terminé',
                                                    'annulé' => 'Annulé',
                                                ];
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$project->status] ?? 'bg-gray-100 text-gray-800' }}">
                                                {{ $statusLabels[$project->status] ?? $project->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('projects.show', $project) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                    Voir
                                                </a>
                                                <a href="{{ route('projects.edit', $project) }}" class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                    Modifier
                                                </a>
                                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300 text-center">
                                            Aucun projet client trouvé.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
