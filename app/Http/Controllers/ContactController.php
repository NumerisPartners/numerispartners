<?php

namespace App\Http\Controllers;

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

        // Ici, vous pourriez envoyer un email avec les informations du formulaire
        // Mail::to('contact@numerispartners.com')->send(new \App\Mail\ContactForm($validated));

        return redirect()->route('contact.index')->with('success', 'Votre message a été envoyé avec succès !');
    }
}
