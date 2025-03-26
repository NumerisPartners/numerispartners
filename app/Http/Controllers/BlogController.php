<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     */
    public function index()
    {
        $blogs = Blog::with(['user', 'category'])
                    ->published()
                    ->latest('published_at')
                    ->paginate(6);
        
        $categories = BlogCategory::withCount(['blogs' => function($query) {
                        $query->published();
                    }])
                    ->orderBy('name')
                    ->get();
        
        $recentPosts = Blog::published()
                        ->latest('published_at')
                        ->take(5)
                        ->get();
        
        return view('pages.blog.index', compact('blogs', 'categories', 'recentPosts'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(Blog $blog)
    {
        // Vérifier si l'article est publié
        if (!$blog->is_published || ($blog->published_at && $blog->published_at > now())) {
            abort(404);
        }
        
        $categories = BlogCategory::withCount(['blogs' => function($query) {
                        $query->published();
                    }])
                    ->orderBy('name')
                    ->get();
        
        $recentPosts = Blog::published()
                        ->where('id', '!=', $blog->id)
                        ->latest('published_at')
                        ->take(5)
                        ->get();
        
        return view('pages.blog.show', compact('blog', 'categories', 'recentPosts'));
    }

    /**
     * Display blog posts by category.
     */
    public function category(BlogCategory $category)
    {
        $blogs = Blog::with(['user', 'category'])
                    ->where('category_id', $category->id)
                    ->published()
                    ->latest('published_at')
                    ->paginate(6);
        
        $categories = BlogCategory::withCount(['blogs' => function($query) {
                        $query->published();
                    }])
                    ->orderBy('name')
                    ->get();
        
        $recentPosts = Blog::published()
                        ->latest('published_at')
                        ->take(5)
                        ->get();
        
        return view('pages.blog.category', compact('blogs', 'categories', 'recentPosts', 'category'));
    }
}
