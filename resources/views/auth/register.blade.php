<x-guest-layout>
    <x-slot name="title">Inscription</x-slot>
    
    <div class="text-center mb-5">
        <h4>Créer un compte</h4>
        <p>Rejoignez Numeris Partners en créant votre compte personnel</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="single-input-inner">
            <label for="name" class="form-label">Nom</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
        </div>

        <!-- Email Address -->
        <div class="single-input-inner mt-4">
            <label for="email" class="form-label">Adresse email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <!-- Password -->
        <div class="single-input-inner mt-4">
            <label for="password" class="form-label">Mot de passe</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Confirm Password -->
        <div class="single-input-inner mt-4">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="text-decoration-none" href="{{ route('login') }}">
                Déjà inscrit ?
            </a>

            <button type="submit" class="btn btn-base">
                S'inscrire
            </button>
        </div>
    </form>
</x-guest-layout>
