<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     */
    public function index()
    {
        $blogs = Blog::with(['user', 'category'])
                    ->latest()
                    ->paginate(10);
        
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('name')->get();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request)
    {
        // Convertir is_published en booléen
        $request->merge([
            'is_published' => $request->has('is_published') ? true : false,
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs',
            'category_id' => 'required|exists:blog_categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        // Gérer l'upload de l'image mise en avant
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog', 'public');
            $validated['featured_image'] = $imagePath;
        }

        // Définir l'utilisateur actuel comme auteur
        $validated['user_id'] = auth()->id();
        
        // Définir la date de publication si l'article est publié
        if ($request->has('is_published') && $request->is_published && !$request->published_at) {
            $validated['published_at'] = now();
        }

        Blog::create($validated);

        return redirect()->route('admin.blog.index')
                        ->with('success', 'Article créé avec succès.');
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::orderBy('name')->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Convertir is_published en booléen
        $request->merge([
            'is_published' => $request->has('is_published') ? true : false,
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'category_id' => 'required|exists:blog_categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        // Gérer l'upload de l'image mise en avant
        if ($request->hasFile('featured_image')) {
            // Supprimer l'ancienne image si elle existe
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            
            $imagePath = $request->file('featured_image')->store('blog', 'public');
            $validated['featured_image'] = $imagePath;
        }
        
        // Définir la date de publication si l'article est publié
        if ($request->has('is_published') && $request->is_published && !$blog->published_at && !$request->published_at) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')
                        ->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(Blog $blog)
    {
        // Supprimer l'image mise en avant si elle existe
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        
        $blog->delete();

        return redirect()->route('admin.blog.index')
                        ->with('success', 'Article supprimé avec succès.');
    }
}
