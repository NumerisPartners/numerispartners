<x-app-layout>
    <x-slot name="title">{{ isset($category) ? $category->name : 'Blog' }}</x-slot>

    <x-breadcrumb title="{{ isset($category) ? 'Catégorie: ' . $category->name : 'Blog' }}" />

    <!-- blog area start -->
    <div class="blog-area py-12 md:py-16">
        <div class="container">
            <div class="row">
                <div class="custom-md:w-8/12">
                    @if(isset($category))
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold mb-4 dark:text-white">Articles dans la catégorie: {{ $category->name }}</h2>
                            @if($category->description)
                                <p class="text-gray-600 dark:text-gray-300">{{ $category->description }}</p>
                            @endif
                        </div>
                    @endif

                    @if($blogs->count() > 0)
                        @foreach($blogs as $blog)
                            <div class="single-blog-inner wow animated fadeInUp" data-wow-duration="0.8s">
                                <div class="thumb">
                                    @if($blog->featured_image)
                                        <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                                    @else
                                        <img src="{{ asset('images/blog/default.jpg') }}" alt="{{ $blog->title }}">
                                    @endif
                                    <span class="date">{{ $blog->published_at ? $blog->published_at->format('d M') : $blog->created_at->format('d M') }}</span>
                                </div>
                                <div class="details">
                                    <ul class="blog-meta">
                                        <li><i class="far fa-user"></i> Par {{ $blog->user->name }}</li>
                                        <li><i class="far fa-folder-open"></i> {{ $blog->category->name }}</li>
                                    </ul>
                                    <h2 class="title dark:text-white"><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
                                    <p class="dark:text-gray-300">{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 200) }}</p>
                                    <a class="btn btn-border-base mt-4" href="{{ route('blog.show', $blog->slug) }}">Lire la suite <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach

                        <div class="pagination-area text-center mt-12">
                            {{ $blogs->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">
                            <p class="dark:text-white">Aucun article de blog n'a été trouvé.</p>
                        </div>
                    @endif
                </div>
                <div class="custom-md:w-1/3 w-full">
                    @include('pages.blog.blog-sidebar')
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->
  
</x-app-layout>