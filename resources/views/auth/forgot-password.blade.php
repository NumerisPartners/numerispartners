<x-guest-layout>
    <x-slot name="title">Mot de passe oublié</x-slot>
    
    <div class="text-center mb-5">
        <h4 class="text-gray-700 dark:text-white">Réinitialisation du mot de passe</h4>
        <p class="text-gray-700 dark:text-white">Nous vous enverrons un lien pour réinitialiser votre mot de passe</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

    <div class="mb-4 text-gray-700 dark:text-white">
        Indiquez votre adresse e-mail et nous vous enverrons un lien de réinitialisation qui vous permettra de choisir un nouveau mot de passe.
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="single-input-inner">
            <label for="email" class="text-gray-700 dark:text-white">Adresse email</label>
            <input id="email" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="email" name="email" value="{{ old('email') }}" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="text-decoration-none text-gray-700 dark:text-white" href="{{ route('login') }}">
                Retour à la connexion
            </a>
            
            <button type="submit" class="btn btn-base dark:text-white">
                Envoyer le lien
            </button>
        </div>
    </form>
</x-guest-layout>
