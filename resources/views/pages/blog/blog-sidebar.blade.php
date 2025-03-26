<div class="td-sidebar">
    <div class="widget widget_search">
        <h4 class="widget-title dark:text-white">Rechercher</h4>
        <form class="search-form">
            <div class="form-group">
                <input type="text" name="search" class="form-control dark:bg-gray-700 dark:text-white" placeholder="Rechercher...">
            </div>
            <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <div class="widget widget_categories">
        <h4 class="widget-title dark:text-white">Catégories</h4>
        <ul class="catagory-items">
            @foreach($categories as $cat)
                <li>
                    <a href="{{ route('blog.category', $cat->slug) }}" class="dark:text-gray-300">
                        {{ $cat->name }} <span class="dark:text-white">({{ $cat->blogs_count }})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="widget widget-recent-post">
        <h4 class="widget-title dark:text-white">Articles récents</h4>
        <ul>
            @foreach($recentPosts as $post)
                <li>
                    <div class="media">
                        <div class="media-left">
                            @if($post->featured_image)
                                <img class="w-28" src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                            @else
                                <img class="w-28" src="{{ asset('images/blog/default-thumbnail.jpg') }}" alt="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="media-body">
                            <h6 class="title dark:text-gray-300"><a href="{{ route('blog.show', $post->slug) }}" class="dark:text-white">{{ $post->title }}</a></h6>
                            <span class="post-date dark:text-gray-400">
                                <i class="far fa-calendar-alt"></i>
                                {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>