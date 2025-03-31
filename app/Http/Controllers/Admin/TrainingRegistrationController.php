<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingRegistration;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingRegistrationController extends Controller
{
    /**
     * Afficher la liste des inscriptions pour une session.
     */
    public function index(TrainingSession $session)
    {
        $registrations = $session->registrations()
            ->orderBy('status')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.trainings.sessions.registrations.index', compact('session', 'registrations'));
    }

    /**
     * Afficher le détail d'une inscription.
     */
    public function show(TrainingRegistration $registration)
    {
        return view('admin.trainings.sessions.registrations.show', compact('registration'));
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

    /**
     * Supprimer une inscription.
     */
    public function destroy(TrainingRegistration $registration)
    {
        // Vérifier si l'inscription était confirmée
        $wasConfirmed = $registration->isConfirmed();
        $session = $registration->session;

        // Supprimer l'inscription
        $registration->delete();

        // Incrémenter le nombre de places disponibles si l'inscription était confirmée
        if ($wasConfirmed) {
            $session->incrementAvailableSeats();
        }

        return redirect()->route('admin.trainings.sessions.registrations.index', $session)
            ->with('success', 'L\'inscription a été supprimée avec succès.');
    }

    /**
     * Mettre à jour les places disponibles pour une session.
     */
    public function updateAvailableSeats(TrainingSession $session)
    {
        $session->updateAvailableSeats();
        
        return redirect()->back()->with('success', 'Le nombre de places disponibles a été mis à jour avec succès.');
    }
}
