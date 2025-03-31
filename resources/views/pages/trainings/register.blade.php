@extends('layouts.app')

@section('title', 'Inscription à la formation ' . $session->training->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('trainings.session', ['training' => $session->training->slug, 'session' => $session->id]) }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour à la session
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-6">Inscription à la formation</h1>
        
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">{{ $session->training->title }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-gray-600"><span class="font-medium">Dates :</span> {{ $session->start_date->format('d/m/Y') }} au {{ $session->end_date->format('d/m/Y') }}</p>
                    <p class="text-gray-600"><span class="font-medium">Horaires :</span> {{ $session->start_time }} - {{ $session->end_time }}</p>
                </div>
                <div>
                    <p class="text-gray-600"><span class="font-medium">Lieu :</span> {{ $session->location }}</p>
                    <p class="text-gray-600"><span class="font-medium">Places disponibles :</span> {{ $session->available_seats }} / {{ $session->max_participants }}</p>
                </div>
            </div>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-6">Formulaire d'inscription</h2>
            
            <form action="{{ route('trainings.register.store', ['training' => $session->training->slug, 'session' => $session->id]) }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Prénom *</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', Auth::user()->first_name ?? '') }}" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('first_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', Auth::user()->last_name ?? '') }}" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('last_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                        <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email ?? '') }}" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-center mb-2">
                        <input type="checkbox" name="is_company" id="is_company" value="1" {{ old('is_company') ? 'checked' : '' }} 
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_company" class="ml-2 block text-sm font-medium text-gray-700">Je m'inscris au nom d'une entreprise</label>
                    </div>
                    
                    <div id="company_field" class="{{ old('is_company') ? '' : 'hidden' }}">
                        <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">Nom de l'entreprise</label>
                        <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('company_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Commentaires ou besoins spécifiques</label>
                    <textarea name="notes" id="notes" rows="4" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-600">* Champs obligatoires</p>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isCompanyCheckbox = document.getElementById('is_company');
        const companyField = document.getElementById('company_field');
        
        isCompanyCheckbox.addEventListener('change', function() {
            if (this.checked) {
                companyField.classList.remove('hidden');
            } else {
                companyField.classList.add('hidden');
            }
        });
    });
</script>
@endsection
