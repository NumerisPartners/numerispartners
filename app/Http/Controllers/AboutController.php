<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Affiche la page à propos
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.about.about');
    }
}
