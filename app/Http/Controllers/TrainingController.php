<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Afficher la liste des formations.
     */
    public function index()
    {
        $trainings = Training::where('is_active', true)->latest()->get();
        return view('pages.trainings.index', compact('trainings'));
    }

    /**
     * Afficher les détails d'une formation.
     */
    public function show(Training $training)
    {
        // Vérifier que la formation est active
        if (!$training->is_active) {
            abort(404);
        }
        
        // Récupérer les sessions à venir pour cette formation
        $upcomingSessions = $training->upcomingSessions()->get();
        
        return view('pages.trainings.show', compact('training', 'upcomingSessions'));
    }

    /**
     * Afficher les détails d'une session de formation.
     */
    public function showSession(Training $training, TrainingSession $session)
    {
        // Vérifier que la formation est active
        if (!$training->is_active) {
            abort(404);
        }
        
        // Vérifier que la session appartient bien à cette formation
        if ($session->training_id !== $training->id) {
            abort(404);
        }
        
        return view('pages.trainings.session', compact('training', 'session'));
    }
}
