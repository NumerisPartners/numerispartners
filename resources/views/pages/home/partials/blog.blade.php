@php
   $latestBlogs = \App\Models\Blog::where('is_published', true)->latest()->take(3)->get();
@endphp

@if($latestBlogs->isNotEmpty())
<div class="blog-area blog-area__home py-12 md:py-16 wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.3s">
      <div class="container">
      <div class="section-title text-center wow animated fadeInUp" data-wow-duration="0.8s">
            <p class="sub-title">Actualités</p>
            <h2 class="title">Découvrez nos dernières <span>actualités</span></h2>
         </div>
         <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 md:gap-6 p-4">
            @foreach ($latestBlogs as $index => $blog)
               <div class="w-full">
                  <div class="single-blog-list wow animated fadeInUp dark:border-2 dark:border-indigo-500" data-wow-duration="0.8s" data-wow-delay="{{ $index * 0.3 }}s">
                     <div class="thumb">
                        @if ($blog->featured_image)
                           <img class="border-radius-5 w-full h-48 object-cover" src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                        @else
                           <img class="border-radius-5 w-full h-48 object-cover" src="{{ asset('images/blog/default.png') }}" alt="{{ $blog->title }}">
                        @endif
                        <p class="date">{{ $blog->created_at->format('d F, Y') }}</p>
                     </div>
                     <div class="details">
                        <ul class="blog-meta p-0 dark:text-white flex">
                           <li class="dark:text-white">
                              <i class="far fa-user"></i> 
                              <span class="inline-block dark:text-white">{{ $blog->user->name ?? 'Admin' }}</span></li>
                           @if ($blog->category)
                              <li class="dark:text-white"><i class="far fa-folder-open"></i> <a href="{{ route('blog.category', $blog->category->slug) }}" class="dark:text-white">{{ $blog->category->name }}</a></li>
                           @endif
                        </ul>
                        <h3 class="text-2xl font-semibold mb-6 dark:text-white"><a href="{{ route('blog.show', $blog->slug) }}" class="dark:text-white">{{ $blog->title }}</a></h5>
                        <div class="mb-4 line-clamp-3 text-sm dark:text-white">{!! $blog->excerpt !!}</div>
                        <a class="btn btn-border-base dark:text-white" href="{{ route('blog.show', $blog->slug) }}">Lire la suite <i class="fa fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
         
         <div class="text-center">
            <a href="{{ route('blog.index') }}" class="btn btn-base dark:text-white">Voir tous les articles <i class="fa fa-arrow-right"></i></a>
         </div>
      </div>
   </div>
@endif