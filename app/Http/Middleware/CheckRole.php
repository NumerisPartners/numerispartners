<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        
        if ($user->status !== 'active') {
            Auth::logout();
            return redirect('login')->with('error', 'Votre compte est inactif. Veuillez contacter l\'administrateur.');
        }
        
        // Diviser les rôles par le séparateur |
        $rolesArray = explode('|', $roles);
        
        $hasRole = false;
        foreach ($rolesArray as $role) {
            if ($role === 'admin' && $user->isAdmin()) {
                $hasRole = true;
                break;
            }
            
            if ($role === 'editor' && ($user->isEditor() || $user->isAdmin())) {
                $hasRole = true;
                break;
            }
            
            if ($role === 'user' && $user->hasRole('user')) {
                $hasRole = true;
                break;
            }
        }
        
        if (!$hasRole) {
            abort(403, 'Accès non autorisé. Vous n\'avez pas les permissions nécessaires pour accéder à cette page.');
        }

        return $next($request);
    }
}
