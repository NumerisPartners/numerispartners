<?php

namespace App\Http\Controllers;

use App\Models\ClientProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProjectController extends Controller
{
    /**
     * Affiche la liste des projets clients
     */
    public function index()
    {
        $projects = ClientProject::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau projet
     */
    public function create()
    {
        $projectTypes = [
            'site_web' => 'Site Web',
            'application_mobile' => 'Application Mobile',
            'e_commerce' => 'E-commerce',
            'design_graphique' => 'Design Graphique',
            'marketing_digital' => 'Marketing Digital',
            'autre' => 'Autre'
        ];
        
        return view('pages.projects.create', compact('projectTypes'));
    }

    /**
     * Enregistre un nouveau projet dans la base de données
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'project_type' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
        ];
        
        // En production, on exige le captcha
        if (app()->environment('production')) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }
        
        $validated = $request->validate($rules);

        // Enregistrer le projet dans la base de données
        ClientProject::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'project_type' => $validated['project_type'],
            'description' => $validated['description'],
            'budget' => $validated['budget'] ?? null,
            'deadline' => $validated['deadline'] ?? null,
            'status' => 'nouveau'
        ]);

        return redirect()->route('projects.create')->with('success', 'Votre demande de projet a été envoyée avec succès ! Nous vous contacterons prochainement.');
    }

    /**
     * Affiche les détails d'un projet spécifique
     */
    public function show(ClientProject $project)
    {
        return view('pages.projects.show', compact('project'));
    }

    /**
     * Affiche le formulaire d'édition d'un projet
     */
    public function edit(ClientProject $project)
    {
        $projectTypes = [
            'site_web' => 'Site Web',
            'application_mobile' => 'Application Mobile',
            'e_commerce' => 'E-commerce',
            'design_graphique' => 'Design Graphique',
            'marketing_digital' => 'Marketing Digital',
            'autre' => 'Autre'
        ];
        
        $statuses = [
            'nouveau' => 'Nouveau',
            'en_discussion' => 'En discussion',
            'en_cours' => 'En cours',
            'terminé' => 'Terminé',
            'annulé' => 'Annulé'
        ];
        
        return view('pages.projects.edit', compact('project', 'projectTypes', 'statuses'));
    }

    /**
     * Met à jour un projet dans la base de données
     */
    public function update(Request $request, ClientProject $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'project_type' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
            'status' => 'required|string|in:nouveau,en_discussion,en_cours,terminé,annulé',
        ]);
        
        $project->update($validated);
        
        return redirect()->route('projects.index')->with('success', 'Le projet a été mis à jour avec succès.');
    }

    /**
     * Supprime un projet de la base de données
     */
    public function destroy(ClientProject $project)
    {
        $project->delete();
        
        return redirect()->route('projects.index')->with('success', 'Le projet a été supprimé avec succès.');
    }
    
    /**
     * Change le statut d'un projet
     */
    public function changeStatus(Request $request, ClientProject $project)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:nouveau,en_discussion,en_cours,terminé,annulé',
        ]);
        
        $project->update(['status' => $validated['status']]);
        
        return redirect()->route('projects.index')->with('success', 'Le statut du projet a été mis à jour avec succès.');
    }
}
