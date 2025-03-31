<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingSessionApiController extends Controller
{
    /**
     * Récupère les sessions d'une formation spécifique
     */
    public function getSessions(Training $training)
    {
        $sessions = $training->sessions()
            ->orderBy('start_date')
            ->get(['id', 'start_date', 'end_date', 'location']);
        
        return response()->json($sessions);
    }
}
