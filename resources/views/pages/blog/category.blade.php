<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }} - {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="bg-white dark:bg-[#150443] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Articles de blog -->
                        <div class="lg:col-span-2">
                            @if($category->description)
                                <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <h3 class="text-lg font-semibold mb-2 dark:text-white">À propos de cette catégorie</h3>
                                    <p class="dark:text-white">{{ $category->description }}</p>
                                </div>
                            @endif

                            <h2 class="text-2xl font-bold mb-6 dark:text-white">Articles dans la catégorie "{{ $category->name }}"</h2>
                            
                            @if($blogs->count() > 0)
                                <div class="space-y-8">
                                    @foreach($blogs as $blog)
                                        <div class="flex flex-col md:flex-row gap-6 pb-8 border-b border-gray-200 dark:border-gray-700">
                                            @if($blog->featured_image)
                                                <div class="md:w-1/3">
                                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                                        <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover rounded-lg">
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="md:w-2/3">
                                                <h3 class="text-xl font-bold mb-2 dark:text-white">
                                                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-indigo-600 dark:text-indigo-500 hover:text-indigo-800 dark:hover:text-indigo-300">
                                                        {{ $blog->title }}
                                                    </a>
                                                </h3>
                                                <div class="flex items-center text-sm dark:text-gray-400 mb-3">
                                                    <span class="dark:text-white">{{ $blog->published_at->format('d/m/Y') }}</span>
                                                    <span class="mx-2 dark:text-white">•</span>
                                                    <span class="dark:text-white">Par {{ $blog->user->name }}</span>
                                                </div>
                                                <div class="dark:text-gray-100 mb-4">{!! $blog->excerpt !!}</div>
                                                <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    Lire la suite
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="mt-8">
                                    {{ $blogs->links() }}
                                </div>
                            @else
                                <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 p-4 mb-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-yellow-700 dark:text-yellow-200">
                                                Aucun article n'a été trouvé dans cette catégorie.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center py-8">
                                    <a href="{{ route('blog.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Retour au blog
                                    </a>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Sidebar -->
                        @include('pages.blog.blog-sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
