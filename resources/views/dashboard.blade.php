<x-app-layout>
    <x-slot name="header">
        Tableau de bord
    </x-slot>

    <div class="service-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center">
                        <h6 class="sub-title">BIENVENUE</h6>
                        <h2 class="title">Bonjour, {{ Auth::user()->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-service-inner text-center">
                        <div class="thumb">
                            <img src="{{ asset('images/service/1.png') }}" alt="img">
                        </div>
                        <div class="details">
                            <h4><a href="{{ route('profile.edit') }}">Mon profil</a></h4>
                            <p>Gérez vos informations personnelles et mettez à jour votre mot de passe.</p>
                            <a class="btn btn-border-base" href="{{ route('profile.edit') }}">Accéder</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service-inner text-center">
                        <div class="thumb">
                            <img src="{{ asset('images/service/2.png') }}" alt="img">
                        </div>
                        <div class="details">
                            <h4><a href="{{ route('services') }}">Nos services</a></h4>
                            <p>Découvrez l'ensemble des services que nous proposons.</p>
                            <a class="btn btn-border-base" href="{{ route('services') }}">Découvrir</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service-inner text-center">
                        <div class="thumb">
                            <img src="{{ asset('images/service/3.png') }}" alt="img">
                        </div>
                        <div class="details">
                            <h4><a href="{{ route('contact.index') }}">Nous contacter</a></h4>
                            <p>Une question? Besoin d'un conseil? N'hésitez pas à nous contacter.</p>
                            <a class="btn btn-border-base" href="{{ route('contact.index') }}">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
