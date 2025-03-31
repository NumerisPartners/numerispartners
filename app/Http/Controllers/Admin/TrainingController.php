<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Training::query();

        // Recherche par titre ou description
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // Filtre par statut
        if ($request->has('status') && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        // Tri des résultats
        $sortField = $request->sort ?? 'created_at';
        $query->orderBy($sortField, 'desc');

        // Pagination
        $trainings = $query->paginate(10);
        
        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'individual_price' => 'required|numeric|min:0',
            'company_price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'is_active' => 'boolean',
        ]);

        // Générer le slug à partir du titre
        $validated['slug'] = Str::slug($validated['title']);

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('trainings', 'public');
            $validated['image'] = $imagePath;
        }

        // Définir is_active si non présent
        $validated['is_active'] = $request->has('is_active') ? true : false;

        // Créer la formation
        $training = Training::create($validated);

        return redirect()->route('admin.trainings.index')
            ->with('success', 'Formation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        return view('admin.trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('admin.trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'individual_price' => 'required|numeric|min:0',
            'company_price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'is_active' => 'boolean',
        ]);

        // Mettre à jour le slug uniquement si le titre a changé
        if ($training->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($training->image) {
                Storage::disk('public')->delete($training->image);
            }
            $imagePath = $request->file('image')->store('trainings', 'public');
            $validated['image'] = $imagePath;
        }

        // Définir is_active
        $validated['is_active'] = $request->has('is_active') ? true : false;

        // Mettre à jour la formation
        $training->update($validated);

        return redirect()->route('admin.trainings.index')
            ->with('success', 'Formation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        // Supprimer l'image si elle existe
        if ($training->image) {
            Storage::disk('public')->delete($training->image);
        }

        // Supprimer la formation
        $training->delete();

        return redirect()->route('admin.trainings.index')
            ->with('success', 'Formation supprimée avec succès.');
    }

    /**
     * Duplicate the specified training.
     */
    public function duplicate(Training $training)
    {
        // Créer une copie de la formation
        $newTraining = $training->replicate();
        
        // Modifier le titre et le slug pour éviter les doublons
        $newTraining->title = $training->title . ' (copie)';
        $newTraining->slug = Str::slug($newTraining->title);
        
        // Si une image existe, la dupliquer
        if ($training->image) {
            $originalPath = $training->image;
            $extension = pathinfo($originalPath, PATHINFO_EXTENSION);
            $newImageName = 'trainings/' . Str::uuid() . '.' . $extension;
            
            if (Storage::disk('public')->exists($originalPath)) {
                Storage::disk('public')->copy($originalPath, $newImageName);
                $newTraining->image = $newImageName;
            }
        }
        
        $newTraining->save();
        
        return redirect()->route('admin.trainings.index')
            ->with('success', 'Formation dupliquée avec succès.');
    }
}
