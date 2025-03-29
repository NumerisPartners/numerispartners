@extends('layouts.app')

@section('title', 'Démarrer un projet')

@push('scripts')
    @if(app()->environment('production'))
    {!! NoCaptcha::renderJs() !!}
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('NOCAPTCHA_SITEKEY') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Project form script loaded');
            const projectForm = document.getElementById('projectForm');
            
            if (projectForm) {
                projectForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ env('NOCAPTCHA_SITEKEY') }}', {action: 'project'})
                        .then(function(token) {
                            document.getElementById('recaptchaResponse').value = token;
                            projectForm.submit();
                        });
                    });
                });
            }
        });
    </script>
    @endif
@endpush

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="Démarrer un projet" />
   <!-- page title end -->
   <!-- project form area start -->
   <div class="py-12 md:py-16">
      <div class="container">
         <div class="project-page-inner bg-[#f8f9fc] dark:bg-[#150443] wow animated fadeInUp p-8 rounded-lg shadow-sm" data-wow-duration="0.8s">
            <div class="section-title mb-[24px] pb-[8px]">
               <h2 class="title dark:text-white">Démarrer un projet avec nous</h2>
               <p class="content mb-0 dark:text-white">Parlez-nous de votre projet et nous vous contacterons pour discuter des détails et vous proposer une solution adaptée à vos besoins.</p>
            </div>
            
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline dark:text-green-800">{{ session('success') }}</span>
            </div>
            @endif
            
            <form action="{{ route('projects.store') }}" method="POST" id="projectForm" class="space-y-6">
                @csrf
                <input type="hidden" id="recaptchaResponse" name="g-recaptcha-response">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Informations personnelles -->
                    <div class="space-y-6">
                        <h3 class="text-xl font-semibold dark:text-white">Informations personnelles</h3>
                        
                        <div class="single-input-inner">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nom complet *</label>
                            <input name="name" id="name" aria-invalid="true" aria-required="true" value="{{ old('name') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" type="text" placeholder="Votre nom complet">
                            @error('name')
                                <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="single-input-inner">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email *</label>
                            <input name="email" id="email" aria-invalid="true" aria-required="true" value="{{ old('email') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror" type="email" placeholder="Votre adresse email">
                            @error('email')
                                <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="single-input-inner">
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Téléphone</label>
                            <input name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror" type="tel" placeholder="Votre numéro de téléphone">
                            @error('phone')
                                <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="single-input-inner">
                            <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Entreprise</label>
                            <input name="company" id="company" value="{{ old('company') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('company') border-red-500 @enderror" type="text" placeholder="Nom de votre entreprise">
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
                            <select name="project_type" id="project_type" aria-invalid="true" aria-required="true" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('project_type') border-red-500 @enderror">
                                <option value="">Sélectionnez un type de projet</option>
                                @foreach($projectTypes as $value => $label)
                                    <option value="{{ $value }}" {{ old('project_type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('project_type')
                                <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="single-input-inner">
                            <label for="budget" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Budget estimé (€)</label>
                            <input name="budget" id="budget" value="{{ old('budget') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('budget') border-red-500 @enderror" type="number" step="0.01" min="0" placeholder="Budget estimé pour votre projet">
                            @error('budget')
                                <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="single-input-inner">
                            <label for="deadline" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date limite souhaitée</label>
                            <input name="deadline" id="deadline" value="{{ old('deadline') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('deadline') border-red-500 @enderror" type="date">
                            @error('deadline')
                                <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="single-input-inner">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description du projet *</label>
                            <textarea name="description" id="description" aria-invalid="true" aria-required="true" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror" placeholder="Décrivez votre projet, vos objectifs et vos attentes" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="w-full mb-4">
                    @error('g-recaptcha-response')
                        <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="w-full text-center mt-8">
                    <button type="submit" class="btn btn-base border-radius-5 dark:text-white px-8 py-3">Soumettre ma demande</button>
                </div>
            </form>
         </div>
      </div>
   </div>
   <!-- project form area end -->
@endsection
