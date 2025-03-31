<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingRegistration;
use App\Models\TrainingSession;
use App\Models\Training;
use Illuminate\Http\Request;

class AllTrainingRegistrationsController extends Controller
{
    /**
     * Affiche toutes les inscriptions aux formations
     */
    public function index(Request $request)
    {
        // Récupérer les filtres depuis la requête
        $trainingId = $request->input('training_id');
        $sessionId = $request->input('session_id');
        $status = $request->input('status');
        $type = $request->input('type');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        // Construire la requête de base
        $query = TrainingRegistration::with(['session.training', 'user']);

        // Appliquer les filtres
        if ($trainingId) {
            $query->whereHas('session', function ($q) use ($trainingId) {
                $q->where('training_id', $trainingId);
            });
        }

        if ($sessionId) {
            $query->where('session_id', $sessionId);
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($type === 'individual') {
            $query->where('is_company', false);
        } elseif ($type === 'company') {
            $query->where('is_company', true);
        }

        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        // Récupérer les inscriptions filtrées
        $registrations = $query->orderBy('created_at', 'desc')->get();

        // Récupérer toutes les formations pour le filtre
        $trainings = Training::orderBy('title')->get();
        
        // Récupérer toutes les sessions pour le filtre
        $sessions = $sessionId || $trainingId 
            ? TrainingSession::when($trainingId, function($q) use ($trainingId) {
                $q->where('training_id', $trainingId);
              })->orderBy('start_date')->get()
            : collect();

        return view('admin.trainings.registrations.all', compact(
            'registrations', 
            'trainings', 
            'sessions', 
            'trainingId', 
            'sessionId', 
            'status', 
            'type',
            'dateFrom',
            'dateTo'
        ));
    }

    /**
     * Confirmer une inscription.
     */
    public function confirm(TrainingRegistration $registration)
    {
        // Vérifier si la session a des places disponibles
        $session = $registration->session;
        
        if ($session->isFull() && $registration->status !== 'confirmed') {
            return redirect()->back()->with('error', 'Cette session est complète. Impossible de confirmer l\'inscription.');
        }

        // Mettre à jour le statut de l'inscription
        $registration->status = 'confirmed';
        $registration->save();

        // Décrémenter le nombre de places disponibles si l'inscription n'était pas déjà confirmée
        if ($registration->wasChanged('status')) {
            $session->decrementAvailableSeats();
        }

        return redirect()->back()->with('success', 'L\'inscription a été confirmée avec succès.');
    }

    /**
     * Annuler une inscription.
     */
    public function cancel(TrainingRegistration $registration)
    {
        // Vérifier si l'inscription était confirmée
        $wasConfirmed = $registration->isConfirmed();

        // Mettre à jour le statut de l'inscription
        $registration->status = 'cancelled';
        $registration->save();

        // Incrémenter le nombre de places disponibles si l'inscription était confirmée
        if ($wasConfirmed) {
            $registration->session->incrementAvailableSeats();
        }

        return redirect()->back()->with('success', 'L\'inscription a été annulée avec succès.');
    }
}
