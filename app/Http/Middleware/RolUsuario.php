<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->rol === 1) {
            //Si es un desarrollador redireccionar a home, en caso contrario seguir mostrando la pagina
            return redirect()->route('home');
        } else {
            return $next($request);
        }
    }
}
