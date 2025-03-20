<x-guest-layout>
    <x-slot name="title">Mot de passe oublié</x-slot>
    
    <div class="text-center mb-5">
        <h4>Réinitialisation du mot de passe</h4>
        <p>Nous vous enverrons un lien pour réinitialiser votre mot de passe</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

    <div class="mb-4">
        Indiquez votre adresse e-mail et nous vous enverrons un lien de réinitialisation qui vous permettra de choisir un nouveau mot de passe.
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="single-input-inner">
            <label for="email" class="form-label">Adresse email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="text-decoration-none" href="{{ route('login') }}">
                Retour à la connexion
            </a>
            
            <button type="submit" class="btn btn-base">
                Envoyer le lien
            </button>
        </div>
    </form>
</x-guest-layout>
