<x-guest-layout>
    <x-slot name="title">Connexion</x-slot>
    
    <div class="text-center mb-5">
        <h4 class="text-gray-700 dark:text-white">Connexion à votre compte</h4>
        <p class="text-gray-700 dark:text-white">Entrez vos identifiants pour accéder à votre espace personnel</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="single-input-inner">
            <label for="email" class="text-gray-700 dark:text-white">Adresse email</label>
            <input id="email" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <!-- Password -->
        <div class="single-input-inner mt-4">
            <label for="password" class="text-gray-700 dark:text-white">Mot de passe</label>
            <input id="password" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Remember Me -->
        <div class="form-check mt-4">
            <input id="remember_me" type="checkbox" class="form-check-input text-gray-700 dark:text-white" name="remember">
            <label class="form-check-label text-gray-700 dark:text-white" for="remember_me">Se souvenir de moi</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            @if (Route::has('password.request'))
                <a class="text-decoration-none text-gray-700 dark:text-white" href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            @endif

            <button type="submit" class="btn btn-base dark:text-white">
                Se connecter
            </button>
        </div>
        
        <div class="text-center mt-4">
            <p class="text-gray-700 dark:text-white">Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="text-decoration-none text-gray-700 dark:text-white">Inscrivez-vous</a></p>
        </div>
    </form>
</x-guest-layout>
