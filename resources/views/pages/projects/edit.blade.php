@extends('layouts.app')

@section('title', 'Modifier le projet')

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="Modifier le projet" />
    <!-- page title end -->

    <div class="py-12 md:py-16">
        <div class="container">
            <div class="project-page-inner bg-[#f8f9fc] dark:bg-[#150443] wow animated fadeInUp overflow-hidden p-8 rounded-lg shadow-sm">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Modifier le projet de {{ $project->name }}</h2>
                        
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline dark:text-green-800">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('projects.update', $project) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Informations personnelles -->
                            <div class="space-y-6">
                                <h3 class="text-xl font-semibold dark:text-white">Informations personnelles</h3>
                                
                                <div class="single-input-inner">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nom complet *</label>
                                    <input name="name" id="name" required="required" aria-required="required" value="{{ old('name', $project->name) }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" type="text" placeholder="Nom complet">
                                    @error('name')
                                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="single-input-inner">
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email *</label>
                                    <input name="email" id="email" required="required" aria-required="required" value="{{ old('email', $project->email) }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror" type="email" placeholder="Email">
                                    @error('email')
                                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="single-input-inner">
                                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Téléphone</label>
                                    <input name="phone" id="phone" value="{{ old('phone', $project->phone) }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror" type="tel" placeholder="Numéro de téléphone">
                                    @error('phone')
                                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="single-input-inner">
                                    <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Entreprise</label>
                                    <input name="company" id="company" value="{{ old('company', $project->company) }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('company') border-red-500 @enderror" type="text" placeholder="Nom de l'entreprise">
                                    @error('company')
                                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Informations du projet -->
                            <div class="space-y-6">
                                <h3 class="text-xl font-semibold dark:text-white">Informations du projet</h3>
                                
                                <div class="single-input-inner">
                                    <label for="project_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Type de projet *</label>
                                    <select name="project_type" id="project_type" required="required" aria-required="required" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('project_type') border-red-500 @enderror">
                                        <option value="">Sélectionnez un type de projet</option>
                                        @foreach($projectTypes as $value => $label)
                                            <option value="{{ $value }}" {{ old('project_type', $project->project_type) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_type')
                                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="single-input-inner">
                                    <label for="budget" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Budget estimé (€)</label>
                                    <input name="budget" id="budget" value="{{ old('budget', $project->budget) }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('budget') border-red-500 @enderror" type="number" step="0.01" min="0" placeholder="Budget estimé">
                                    @error('budget')
                                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="single-input-inner">
                                    <label for="deadline" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date limite souhaitée</label>
                                    <input name="deadline" id="deadline" value="{{ old('deadline', $project->deadline ? $project->deadline->format('Y-m-d') : '') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('deadline') border-red-500 @enderror" type="date">
                                    @error('deadline')
                                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="single-input-inner">
                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Statut *</label>
                                    <select name="status" id="status" required="required" aria-required="required" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('status') border-red-500 @enderror">
                                        @foreach($statuses as $value => $label)
                                            <option value="{{ $value }}" {{ old('status', $project->status) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Description du projet -->
                        <div class="space-y-4">
                            <h3 class="text-xl font-semibold dark:text-white">Description du projet</h3>
                            
                            <div class="single-input-inner">
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description *</label>
                                <textarea name="description" id="description" required="required" aria-required="required" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror" rows="5" placeholder="Description du projet">{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-3 mt-8">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-border-base-outline dark:text-white px-6 py-2">
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-base dark:text-white px-6 py-2">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
