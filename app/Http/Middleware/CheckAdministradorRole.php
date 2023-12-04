<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdministradorRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // CheckAdministradorRole.php
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->tipo === 'Administrador') {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder a esta página como Administrador.');
    }
}
