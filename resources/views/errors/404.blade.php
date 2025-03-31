@extends('layouts.guest')

@section('content')
<div class="row justify-content-center">
    <div class="bg-white dark:bg-[#050231] box-shadow-padding dark:shadow-none dark:border-2 dark:border-indigo-500 rounded-md wow animated fadeInUp">
        <div class="details p-12">
            <div class="flex flex-wrap items-center justify-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <h1 class="text-5xl md:text-7xl font-bold text-gray-700 dark:text-white mb-4">Ooops.</h1>
                    <div class="mb-8">
                        <h2 class="text-2xl md:text-3xl text-gray-600 dark:text-gray-300 mb-2">Relax, take it easy.</h2>
                        <h3 class="text-xl md:text-2xl text-gray-600 dark:text-gray-300">Keep fresh your mind!</h3>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Vous avez trouvé notre page d'erreur 404, ce n'est pas votre faute. 
                        C'est juste une petite erreur. Pour reprendre votre navigation, 
                        vous pouvez cliquer sur le bouton "Retour à l'accueil". 
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('home') }}" class="btn btn-base">
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
                
                <div class="md:w-1/2">
                    <img src="{{ asset('images/errors/404.webp') }}" alt="Illustration page 404" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




