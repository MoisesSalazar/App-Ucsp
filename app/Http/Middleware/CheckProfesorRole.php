<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfesorRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // CheckProfesorRole.php
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->tipo === 'Profesor') {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder a esta página como Profesor.');
    }
}
