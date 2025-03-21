<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Affiche le formulaire de contact
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.contact.contact');
    }

    /**
     * Traite la soumission du formulaire de contact
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Enregistrer le message dans la base de données
        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'unread'
        ]);

        // Ici, vous pourriez envoyer un email avec les informations du formulaire
        // Mail::to('contact@numerispartners.com')->send(new \App\Mail\ContactForm($validated));

        return redirect()->route('contact.index')->with('success', 'Votre message a été envoyé avec succès !');
    }

    /**
     * Affiche la liste des messages de contact
     * 
     * @return \Illuminate\View\View
     */
    public function messages()
    {
        $messages = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.contact.messages', compact('messages'));
    }

    /**
     * Affiche un message spécifique
     * 
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\View\View
     */
    public function show(Contact $contact)
    {
        // Marquer le message comme lu
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }
        
        return view('pages.contact.show', compact('contact'));
    }

    /**
     * Marquer un message comme répondu
     * 
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsReplied(Contact $contact)
    {
        $contact->update(['status' => 'replied']);
        
        return redirect()->route('contact.messages')->with('success', 'Le message a été marqué comme répondu.');
    }
}
