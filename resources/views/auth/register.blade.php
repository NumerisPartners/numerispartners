<x-guest-layout>
    <x-slot name="title">Inscription</x-slot>
    
    <div class="text-center mb-5">
        <h4 class="text-gray-700 dark:text-white">Créer un compte</h4>
        <p class="text-gray-700 dark:text-white">Rejoignez Numeris Partners en créant votre compte personnel</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="single-input-inner">
            <label for="name" class="text-gray-700 dark:text-white">Nom</label>
            <input id="name" required="required" aria-required="required" autocomplete="name" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
        </div>

        <!-- Email Address -->
        <div class="single-input-inner mt-4">
            <label for="email" class="text-gray-700 dark:text-white">Adresse email</label>
            <input id="email" required="required" aria-required="required" autocomplete="username" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <!-- Password -->
        <div class="single-input-inner mt-4">
            <label for="password" class="text-gray-700 dark:text-white">Mot de passe</label>
            <input id="password" required="required" aria-required="required" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Confirm Password -->
        <div class="single-input-inner mt-4">
            <label for="password_confirmation" class="text-gray-700 dark:text-white">Confirmer le mot de passe</label>
            <input id="password_confirmation" required="required" aria-required="required" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 " type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="text-decoration-none text-gray-700 dark:text-white" href="{{ route('login') }}">
                Déjà inscrit ?
            </a>

            <button type="submit" class="btn btn-base dark:text-white">
                S'inscrire
            </button>
        </div>
    </form>
</x-guest-layout>
