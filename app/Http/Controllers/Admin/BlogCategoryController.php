<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the blog categories.
     */
    public function index()
    {
        $categories = BlogCategory::withCount('blogs')
                    ->orderBy('name')
                    ->paginate(10);
        
        return view('admin.blog.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new blog category.
     */
    public function create()
    {
        return view('admin.blog.categories.create');
    }

    /**
     * Store a newly created blog category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories',
            'description' => 'nullable|string',
        ]);

        BlogCategory::create($validated);

        return redirect()->route('admin.blog.categories.index')
                        ->with('success', 'Catégorie créée avec succès.');
    }

    /**
     * Show the form for editing the specified blog category.
     */
    public function edit(BlogCategory $category)
    {
        return view('admin.blog.categories.edit', compact('category'));
    }

    /**
     * Update the specified blog category in storage.
     */
    public function update(Request $request, BlogCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories,slug,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return redirect()->route('admin.blog.categories.index')
                        ->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Remove the specified blog category from storage.
     */
    public function destroy(BlogCategory $category)
    {
        // Vérifier si la catégorie contient des articles
        if ($category->blogs()->count() > 0) {
            return redirect()->route('admin.blog.categories.index')
                            ->with('error', 'Impossible de supprimer cette catégorie car elle contient des articles.');
        }
        
        $category->delete();

        return redirect()->route('admin.blog.categories.index')
                        ->with('success', 'Catégorie supprimée avec succès.');
    }
}
