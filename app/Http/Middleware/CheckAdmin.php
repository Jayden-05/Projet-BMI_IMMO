<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'Admin') {
            return $next($request);
        }

        // Redirection selon le rôle
        if (auth()->check() && auth()->user()->role === 'Agent') {
            return redirect()->route('bien.index')->with('error', 'Accès non autorisé');
        }

        return redirect()->route('accueil')->with('error', 'Accès non autorisé');
    }
}
