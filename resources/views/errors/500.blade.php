@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="flex flex-wrap items-center justify-center">
        <div class="w-full md:w-1/2 lg:pr-12 mb-10 md:mb-0">
            <h1 class="text-5xl md:text-7xl font-bold text-gray-700 dark:text-white mb-4">Oups !</h1>
            <div class="mb-8">
                <h2 class="text-2xl md:text-3xl text-gray-600 dark:text-gray-300 mb-2">Erreur serveur.</h2>
                <h3 class="text-xl md:text-2xl text-gray-600 dark:text-gray-300">Nous travaillons à résoudre le problème.</h3>
            </div>
            
            <p class="text-gray-600 dark:text-gray-300 mb-6">
                Une erreur inattendue s'est produite sur notre serveur. Notre équipe technique 
                a été informée et travaille actuellement à résoudre ce problème.
                Nous nous excusons pour la gêne occasionnée.
            </p>
            
            <p class="text-gray-600 dark:text-gray-300 mb-8">
                En attendant, vous pouvez essayer de rafraîchir la page ou revenir à l'accueil.
            </p>
            
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('home') }}" class="btn btn-base">
                    Retour à l'accueil
                </a>
                <a href="{{ route('contact.index') }}" class="btn btn-border-base-outline">
                    Nous contacter
                </a>
            </div>
        </div>
        
        <div class="w-full md:w-1/2">
            <img src="" alt="Illustration page 500" class="w-full h-auto">
        </div>
    </div>
</div>
@endsection
