<?php

namespace App\Http\Controllers;

use App\Models\TrainingRegistration;
use App\Models\TrainingSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TrainingRegistrationController extends Controller
{
    /**
     * Afficher le formulaire d'inscription à une session de formation.
     */
    public function create($training, $sessionId)
    {
        // Récupérer la session de formation
        $session = TrainingSession::findOrFail($sessionId);
        
        // Vérifier si la session est complète
        if ($session->isFull()) {
            return redirect()->back()->with('error', 'Cette session est complète. Veuillez choisir une autre session.');
        }

        // Vérifier si la session est passée
        if ($session->isPast()) {
            return redirect()->back()->with('error', 'Cette session est déjà terminée. Veuillez choisir une session à venir.');
        }

        // Vérifier si l'utilisateur est déjà inscrit à cette session
        if (Auth::check()) {
            $existingRegistration = TrainingRegistration::where('training_session_id', $session->id)
                ->where('user_id', Auth::id())
                ->first();

            if ($existingRegistration) {
                return redirect()->back()->with('error', 'Vous êtes déjà inscrit à cette session.');
            }
        }

        return view('pages.trainings.register', compact('session'));
    }

    /**
     * Traiter la demande d'inscription à une session de formation.
     */
    public function store(Request $request, $training, $sessionId)
    {
        // Récupérer la session de formation
        $session = TrainingSession::findOrFail($sessionId);
        
        // Valider les données du formulaire
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'is_company' => 'boolean',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Vérifier si la session est complète
        if ($session->isFull()) {
            return redirect()->back()->with('error', 'Cette session est complète. Veuillez choisir une autre session.');
        }

        // Créer l'inscription
        $registration = new TrainingRegistration([
            'training_session_id' => $session->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'is_company' => $request->has('is_company'),
            'notes' => $request->notes,
            'status' => 'pending', // Par défaut, l'inscription est en attente
        ]);

        // Associer l'utilisateur connecté à l'inscription
        if (Auth::check()) {
            $registration->user_id = Auth::id();
        }

        $registration->save();

        return redirect()->route('trainings.session', ['training' => $session->training->slug, 'session' => $session->id])
            ->with('success', 'Votre demande d\'inscription a été enregistrée avec succès. Vous recevrez une confirmation par email.');
    }

    /**
     * Afficher la liste des inscriptions de l'utilisateur connecté.
     */
    public function myRegistrations()
    {
        $registrations = TrainingRegistration::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('pages.trainings.my-registrations', compact('registrations'));
    }

    /**
     * Confirmer une inscription (réservé aux administrateurs).
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
        // Vérifier si l'utilisateur est autorisé à annuler cette inscription
        if (!Auth::user()->isAdmin() && Auth::id() !== $registration->user_id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à annuler cette inscription.');
        }

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
     * Afficher la liste des inscriptions pour une session (réservé aux administrateurs).
     */
    public function index(TrainingSession $session)
    {
        $registrations = $session->registrations()->orderBy('created_at', 'desc')->get();
        
        return view('admin.trainings.sessions.registrations.index', compact('session', 'registrations'));
    }
}
