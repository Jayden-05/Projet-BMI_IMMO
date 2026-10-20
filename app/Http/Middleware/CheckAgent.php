<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAgent
{
    /**
     * Handle an incoming request.
     * Agents can access all pages EXCEPT agents, proprietaires, and action pages
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['Agent', 'Admin'])) {
            return redirect()->route('accueil')->with('error', 'Accès non autorisé');
        }

        // Agents cannot access: agents, proprietaires, actions, users
        if (auth()->user()->role === 'Agent') {
            $restrictedRoutes = ['agent.index', 'agent.create', 'agent.edit', 'agent.show', 'agent.destroy',
                                'proprietaire.index', 'proprietaire.create', 'proprietaire.edit', 'proprietaire.show', 'proprietaire.destroy'];

            $currentRoute = $request->route()->getName();

            if (in_array($currentRoute, $restrictedRoutes)) {
                return redirect()->route('bien.index')->with('error', 'Accès non autorisé');
            }
        }

        return $next($request);
    }
}
