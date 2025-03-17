<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Affiche la page des services
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.services');
    }
}
