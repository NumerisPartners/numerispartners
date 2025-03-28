@extends('layouts.app')

@section('title', 'Détails du projet')

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="Détails du projet" />
    <!-- page title end -->

    <div class="py-12 md:py-16">
        <div class="container">
            <div class="bg-white dark:bg-[#150443] shadow-sm rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Projet de {{ $project->name }}</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('projects.index') }}" class="btn btn-border-base-outline dark:text-white">
                                Retour à la liste
                            </a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-base dark:text-white">
                                Modifier
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline dark:text-green-800">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Informations du client -->
                        <div class="bg-gray-50 dark:bg-[#050231] dark:text-white p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Informations du client</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nom</p>
                                    <p class="text-base text-gray-900 dark:text-white">{{ $project->name }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</p>
                                    <p class="text-base text-gray-900 dark:text-white">{{ $project->email }}</p>
                                </div>
                                
                                @if($project->phone)
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Téléphone</p>
                                    <p class="text-base text-gray-900 dark:text-white">{{ $project->phone }}</p>
                                </div>
                                @endif
                                
                                @if($project->company)
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Entreprise</p>
                                    <p class="text-base text-gray-900 dark:text-white">{{ $project->company }}</p>
                                </div>
                                @endif
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Date de soumission</p>
                                    <p class="text-base text-gray-900 dark:text-white">{{ $project->created_at->format('d/m/Y à H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Informations du projet -->
                        <div class="bg-gray-50 dark:bg-[#050231] dark:text-white p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Informations du projet</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Type de projet</p>
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
                                    <p class="text-base text-gray-900 dark:text-white">{{ $projectTypes[$project->project_type] ?? $project->project_type }}</p>
                                </div>
                                
                                @if($project->budget)
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Budget estimé</p>
                                    <p class="text-base text-gray-900 dark:text-white">{{ number_format($project->budget, 2, ',', ' ') }} €</p>
                                </div>
                                @endif
                                
                                @if($project->deadline)
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Date limite souhaitée</p>
                                    <p class="text-base text-gray-900 dark:text-white">{{ $project->deadline->format('d/m/Y') }}</p>
                                </div>
                                @endif
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Statut actuel</p>
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
                                    <span class="px-2 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $statusClasses[$project->status] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ $statusLabels[$project->status] ?? $project->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description du projet -->
                    <div class="mt-6 bg-gray-50 dark:bg-[#050231] dark:text-white p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Description du projet</h3>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $project->description }}</p>
                        </div>
                    </div>
                    
                    <!-- Changer le statut -->
                    <div class="mt-6 bg-gray-50 dark:bg-[#050231] dark:text-white p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Changer le statut</h3>
                        
                        <form action="{{ route('projects.change-status', $project) }}" method="POST" class="flex flex-wrap gap-2">
                            @csrf
                            
                            @php
                                $statuses = [
                                    'nouveau' => 'Nouveau',
                                    'en_discussion' => 'En discussion',
                                    'en_cours' => 'En cours',
                                    'terminé' => 'Terminé',
                                    'annulé' => 'Annulé',
                                ];
                            @endphp
                            
                            @foreach($statuses as $value => $label)
                                <button type="submit" name="status" value="{{ $value }}" 
                                    class="px-4 py-2 rounded-md text-sm font-medium 
                                    {{ $project->status === $value 
                                        ? 'bg-gray-300 text-gray-800 dark:bg-gray-600 dark:text-white cursor-not-allowed' 
                                        : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600' }}"
                                    {{ $project->status === $value ? 'disabled' : '' }}>
                                    {{ $label }}
                                </button>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
