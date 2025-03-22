<x-app-layout>
    <x-slot name="title">Mon profil</x-slot>
    <x-slot name="header">
        Mon profil
    </x-slot>

    <x-breadcrumb title="Gérer votre compte" />

    <div class="service-area py-12 md:py-16">
        <div class="container">
            <div class="bg-[#f8f9fc] dark:bg-[#150443]  wow animated fadeInUp rounded-lg pt-10" data-wow-duration="0.8s">
                <div class="row justify-content-center">
                    <div class="col-lg-8 mb-5">
                        <div class="single-blog-inner style-2 px-10">
                            <div class="details">
                                <h4 class="dark:text-white">Informations du profil</h4>
                                <p class="mb-4 dark:text-white">Mettez à jour les informations de profil et l'adresse e-mail de votre compte.</p>
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8 mb-5">
                        <div class="single-blog-inner style-2 px-10">
                            <div class="details">
                                <h4 class="dark:text-white">Mettre à jour le mot de passe</h4>
                                <p class="mb-4 dark:text-white">Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.</p>
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="single-blog-inner style-2 px-10">
                            <div class="details">
                                <h4 class="dark:text-white text-danger">Supprimer le compte</h4>
                                <p class="mb-4 dark:text-white">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.</p>
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
