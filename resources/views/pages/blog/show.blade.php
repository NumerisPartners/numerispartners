<x-app-layout>
    <x-slot name="title">{{ $blog->title }}</x-slot>

    <x-breadcrumb title="{{ $blog->title }}" />

    <div class="blog-area py-12 md:py-16 wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.3s">
        <div class="container">
            <div class="row">
                <div class="custom-md:w-8/12">
                    <div class="blog-details-page-content">
                        <div class="single-blog-inner wow animated fadeInUp" data-wow-duration="0.8s">
                            <div class="thumb">
                                @if($blog->featured_image)
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                                @else
                                    <img src="{{ asset('images/blog/default.jpg') }}" alt="{{ $blog->title }}">
                                @endif
                            </div>
                            <div class="details">
                                <ul class="blog-meta">
                                    <li><i class="far fa-user"></i> Par {{ $blog->user->name }}</li>
                                    <li><i class="far fa-folder-open"></i> <a href="{{ route('blog.category', $blog->category->slug) }}">{{ $blog->category->name }}</a></li>
                                    <li><i class="far fa-calendar-alt"></i> {{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}</li>
                                </ul>
                                
                                <div class="blog-content mt-4 dark:text-gray-300">
                                    {!! $blog->content !!}
                                </div>
                                
                                <div class="tag-and-share mt-8">
                                    <div class="tags inline-block">
                                        <strong class="dark:text-white">Catégorie : </strong>
                                        <a href="{{ route('blog.category', $blog->category->slug) }}" class="dark:text-gray-300">{{ $blog->category->name }}</a>
                                    </div>
                                </div>
                                
                                <div class="prev-next-post mt-8">
                                    <div class="row">
                                        @php
                                            $previousBlog = \App\Models\Blog::published()->where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
                                            $nextBlog = \App\Models\Blog::published()->where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
                                        @endphp
                                        
                                        <div class="!w-6/12 border-right-1">
                                            @if($previousBlog)
                                                <a href="{{ route('blog.show', $previousBlog->slug) }}" title="{{ $previousBlog->title }}"
                                                    class="inline-flex items-center border border-indigo-300 px-3 py-1.5 rounded-md text-indigo-500 hover:bg-indigo-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
                                                        </path>
                                                    </svg>
                                                    <span class="ml-1 font-bold text-lg">Précédent</span>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="!w-6/12 text-end">
                                            @if($nextBlog)
                                                <a href="{{ route('blog.show', $nextBlog->slug) }}" title="{{ $nextBlog->title }}"
                                                    class="inline-flex items-center border border-indigo-300 px-3 py-1.5 rounded-md text-indigo-500 hover:bg-indigo-50">
                                                    <span class="mr-1 font-bold text-lg">Suivant</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="blog-admin media wow animated fadeInUp mt-8" data-wow-duration="0.8s">
                            <div class="media-left pe-[16px]">
                                <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="media-body self-center">
                                <h6 class="dark:text-white">{{ $blog->user->name }}</h6>
                                <p class="dark:text-gray-300">{{ $blog->user->profile ?? 'Auteur sur Numeris Partners' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-md:w-1/3 w-full">
                    @include('pages.blog.blog-sidebar')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>