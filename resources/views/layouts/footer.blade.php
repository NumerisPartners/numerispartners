<!-- footer area start -->
<footer id="footer" role="contentinfo" class="footer-area bg-black dark:bg-[#0e032d] bg-cover bg-center p-10 m-0 dark:border-t-4 dark:border-t-indigo-500" role="contentinfo">
   <div class="container">
      <div class="row">
         <div class="custom-sm:w-1/2 custom-md:w-1/4 ">
            <div class="widget widget_about wow animated fadeInUp" data-wow-duration="0.8s">
               <div class="thumb">
                  <img src="{{ asset('images/logo2.png') }}" alt="img">
               </div>
               <div class="details">
                  <p>Solutions digitales innovantes pour votre entreprise.</p>
                  <p class="mt-[16px]"><i class="fa fa-phone-alt"></i> +33 66 724 45 13</p>
                  <p class="mt-[8px]"><i class="fas fa-envelope"></i> contact@heuristikpartners.com</p>
                  <!-- <ul class="social-media">
                     <li>
                        <a href="index.html">
                           <i class="fab fa-facebook-f"></i>
                        </a>
                     </li>
                     <li>
                        <a href="index.html">
                           <i class="fab fa-twitter"></i>
                        </a>
                     </li>
                     <li>
                        <a href="index.html">
                           <i class="fab fa-instagram"></i>
                        </a>
                     </li>
                     <li>
                        <a href="index.html">
                           <i class="fab fa-youtube"></i>
                        </a>
                     </li>
                  </ul> -->
               </div>
            </div>
         </div>

         <div class="custom-sm:w-1/2 custom-md:w-1/4 ">
            <div class="widget widget_nav_menu wow animated fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
               <h2 class="widget-title">Liens rapides</h2>
               <ul>
                  <li><a href="{{ route('home') }}"><i class="fas fa-arrow-right"></i> Accueil</a></li>
                  <li><a href="{{ route('services') }}"><i class="fas fa-arrow-right"></i> Services</a></li>
                  <li><a href="{{ route('about') }}"><i class="fas fa-arrow-right"></i> À propos</a></li>
                  <li><a href="{{ route('blog.index') }}"><i class="fas fa-arrow-right"></i> Blog</a></li>
                  <li><a href="{{ route('contact.index') }}"><i class="fas fa-arrow-right"></i> Contact</a></li>
               </ul>
            </div>
         </div>

         <div class="custom-sm:w-1/2 custom-md:w-1/4 ">
            <div class="widget widget_nav_menu wow animated fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
               <h2 class="widget-title">Nos Services</h2>
               <ul>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Stratégie de Transformation Digitale</a></li>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Développement Web, Mobile & Bases de données</a></li>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Design UX/UI</a></li>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Digital marketing </a></li>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Migration d’applications</a></li>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Tests d’application, audits</a></li>
               </ul>
            </div>
         </div>

         <div class="custom-sm:w-1/2 custom-md:w-1/4 ">
            <div class="widget widget_nav_menu wow animated fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
               <h2 class="widget-title">Nos Formations</h2>
               <ul>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Leadership & Management</a></li>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Transformation Data & Digitale</a></li>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Transformation Agile</a></li>
                  <li><a href="service.html"><i class="fas fa-arrow-right"></i> Accompagnement Start up</a></li>
                  
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="footer-bottom border-t border-gray-500 dark:border-indigo-500">
      <div class="container">
         <div class="row">
            <div class="custom-sm:w-1/2 self-center">
               <p>&copy; {{ date('Y') }} Heuristik Partners. Tous droits réservés.</p>
            </div>
            <div class="custom-sm:w-1/2    custom-md:!text-end">
               <a class="inline-block hover:text-blue-500 focus:text-blue-500" href="{{ route('legal.mentions-legales') }}">Mentions légales </a>
               <a class="inline-block hover:text-blue-500 focus:text-blue-500" href="{{ route('legal.politique-confidentialite') }}">Politique de confidentialité</a>
               <a class="inline-block hover:text-blue-500 focus:text-blue-500" href="{{ route('legal.plan-du-site') }}">Plan du site</a>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- footer area end -->
<!-- back to top area start -->
<div class="back-to-top">
   <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"
   integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>