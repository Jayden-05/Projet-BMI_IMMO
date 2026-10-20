<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClient
{
    /**
     * Handle an incoming request.
     * Clients redirect to public biens view
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'Client') {
            return redirect()->route('bien_details', 1)->with('info', 'Bienvenue ' . auth()->user()->name);
        }

        return $next($request);
    }
}
