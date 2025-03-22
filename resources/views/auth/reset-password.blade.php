<x-guest-layout>
    <x-slot name="title">Réinitialisation du mot de passe</x-slot>
    
    <div class="text-center mb-5">
        <h4 class="text-gray-700 dark:text-white">Nouveau mot de passe</h4>
        <p class="text-gray-700 dark:text-white">Créez un nouveau mot de passe sécurisé pour votre compte</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="single-input-inner">
            <label for="email" class="text-gray-700 dark:text-white">Adresse email</label>
            <input id="email" required="required" aria-required="required" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <!-- Password -->
        <div class="single-input-inner mt-4">
            <label for="password" class="text-gray-700 dark:text-white">Nouveau mot de passe</label>
            <input id="password" required="required" aria-required="required" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Confirm Password -->
        <div class="single-input-inner mt-4">
            <label for="password_confirmation" class="text-gray-700 dark:text-white">Confirmer le mot de passe</label>
            <input id="password_confirmation" required="required" aria-required="required" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                Réinitialiser le mot de passe
            </button>
        </div>
    </form>
</x-guest-layout>
