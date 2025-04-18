@extends('layouts.app')

@section('title', 'Nous contacter')

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('NOCAPTCHA_SITEKEY') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Contact form script loaded');
            const contactForm = document.getElementById('contactForm');
            
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ env('NOCAPTCHA_SITEKEY') }}', {action: 'contact'})
                        .then(function(token) {
                            document.getElementById('recaptchaResponse').value = token;
                            contactForm.submit();
                        });
                    });
                });
            }
        });
    </script>
@endpush

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="Nous contacter" />
   <!-- page title end -->
   <!-- contact area start -->
   <div class="py-12 md:py-16">
      <div class="container">
         <div class="contact-page-inner bg-[#f8f9fc] dark:bg-[#150443] wow animated fadeInUp" data-wow-duration="0.8s">
            <div class="section-title mb-[24px] pb-[8px]">
               <h2 class="title dark:text-white">Envoyez-nous un message </h2>
               <p class="content mb-0 dark:text-white">Nous sommes à votre écoute. N'hésitez pas à nous contacter pour toute question.</p>
            </div>
            
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline dark:text-green-800">{{ session('success') }}</span>
            </div>
            @endif
            
            <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                @csrf
                <input type="hidden" id="recaptchaResponse" name="g-recaptcha-response">
                <p class="text-gray-700 dark:text-white mb-4">Tous les champs de ce formulaire sont obligatoires.</p>
                <div class="row">
                   <div class="custom-sm:w-full">
                      <div class="single-input-inner">
                         <input name="name" required="required" aria-required="true" value="{{ old('name') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" type="text" placeholder="Nom complet">
                         @error('name')
                            <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                         @enderror
                      </div>
                   </div>
                   <div class="custom-sm:w-full">
                      <div class="single-input-inner">
                         <input name="email" required="required" aria-required="true" value="{{ old('email') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror" type="email" placeholder="Email">
                         @error('email')
                            <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                         @enderror
                      </div>
                   </div>
                   <div class="custom-sm:w-full">
                      <div class="single-input-inner">
                         <input name="subject" required="required" aria-required="true" value="{{ old('subject') }}" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('subject') border-red-500 @enderror" type="text" placeholder="Sujet">
                         @error('subject')
                            <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                         @enderror
                      </div>
                   </div>
                   <div class="w-full">
                      <div class="single-input-inner">
                         <textarea name="message" required="required" aria-required="true" class="w-full px-4 py-3 bg-white dark:bg-[#050231] border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('message') border-red-500 @enderror" placeholder="Message">{{ old('message') }}</textarea>
                         @error('message')
                            <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                         @enderror
                      </div>
                   </div>
                   <div class="w-full mb-4">
                       @error('g-recaptcha-response')
                          <span class="text-red-500 text-sm dark:text-white">{{ $message }}</span>
                       @enderror
                    </div>
                   <div class="w-full text-center">
                      <button type="submit" class="btn btn-base border-radius-5 dark:text-white">Envoyer</button>
                   </div>
                </div>
            </form>
         </div>
      </div>
   </div>
    <!-- CTA Section -->
    @include('components.cta-section')
   
@endsection
