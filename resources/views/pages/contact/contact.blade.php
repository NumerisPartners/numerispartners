@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="Contact" />
   <!-- page title end -->
   <!-- contact area start -->
   <div class="bg-white pd-top-120 pd-bottom-120 border-2">
      <div class="container">
         <div class="contact-page-inner bg-[#f8f9fc] wow animated fadeInUp" data-wow-duration="0.8s">
            <div class="section-title mb-[24px] pb-[8px]">
               <h2 class="title">Envoyez-nous un message </h2>
               <p class="content mb-0">Nous sommes à votre écoute. N'hésitez pas à nous contacter pour toute question ou demande de devis.</p>
            </div>
            <div class="row">
               <div class="custom-sm:w-full">
                  <div class="single-input-inner">
                     <input class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" type="text" placeholder="Nom complet">
                  </div>
               </div>
               <div class="custom-sm:w-full">
                  <div class="single-input-inner">
                     <input class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror" type="email" placeholder="Email">
                  </div>
               </div>
               <div class="custom-sm:w-full">
                  <div class="single-input-inner">
                     <input class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror" type="text" placeholder="Téléphone">
                  </div>
               </div>
               <div class="w-full">
                  <div class="single-input-inner">
                     <textarea class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('message') border-red-500 @enderror" placeholder="Message"></textarea>
                  </div>
               </div>
               <div class="w-full text-center">
                  <button class="btn btn-base border-radius-5">Envoyer</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   
@endsection
