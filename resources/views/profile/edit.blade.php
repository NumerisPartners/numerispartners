<x-app-layout>
    <x-slot name="header">
        Mon profil
    </x-slot>

    <div class="service-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="bg-[#f8f9fc] dark:bg-[#150443] wow animated fadeInUp rounded-lg pt-10" data-wow-duration="0.8s">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center">
                            <h6 class="sub-title">PROFIL</h6>
                            <h2 class="title">Gérer votre compte</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-8 mb-5">
                        <div class="single-blog-inner style-2">
                            <div class="details">
                                <h4>Informations du profil</h4>
                                <p class="mb-4">Mettez à jour les informations de profil et l'adresse e-mail de votre compte.</p>
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8 mb-5">
                        <div class="single-blog-inner style-2">
                            <div class="details">
                                <h4>Mettre à jour le mot de passe</h4>
                                <p class="mb-4">Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.</p>
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="single-blog-inner style-2">
                            <div class="details">
                                <h4 class="text-danger">Supprimer le compte</h4>
                                <p class="mb-4">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.</p>
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
