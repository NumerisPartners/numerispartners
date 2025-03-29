<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Training $training)
    {
        $sessions = $training->sessions()->orderBy('start_date')->get();
        return view('admin.trainings.sessions.index', compact('training', 'sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Training $training)
    {
        return view('admin.trainings.sessions.create', compact('training'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Training $training)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'max_participants' => 'required|integer|min:1',
            'is_confirmed' => 'boolean',
        ]);

        // Définir is_confirmed si non présent
        $validated['is_confirmed'] = $request->has('is_confirmed') ? true : false;
        
        // Définir le nombre de places disponibles initial
        $validated['available_seats'] = $validated['max_participants'];

        // Créer la session
        $session = $training->sessions()->create($validated);

        return redirect()->route('admin.trainings.sessions.index', $training)
            ->with('success', 'Session de formation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training, TrainingSession $session)
    {
        return view('admin.trainings.sessions.show', compact('training', 'session'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training, TrainingSession $session)
    {
        return view('admin.trainings.sessions.edit', compact('training', 'session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training, TrainingSession $session)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'max_participants' => 'required|integer|min:1',
            'available_seats' => 'required|integer|min:0',
            'is_confirmed' => 'boolean',
        ]);

        // Définir is_confirmed si non présent
        $validated['is_confirmed'] = $request->has('is_confirmed') ? true : false;

        // Mettre à jour la session
        $session->update($validated);

        return redirect()->route('admin.trainings.sessions.index', $training)
            ->with('success', 'Session de formation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training, TrainingSession $session)
    {
        // Supprimer la session
        $session->delete();

        return redirect()->route('admin.trainings.sessions.index', $training)
            ->with('success', 'Session de formation supprimée avec succès.');
    }
}
