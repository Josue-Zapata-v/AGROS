<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Comprueba que el usuario autenticado tiene el rol indicado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * @param  string                    $role   (p. ej. 'comprador', 'agricultor', 'transportista')
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Si no está autenticado, lo redirigimos al login
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // Si el rol no coincide, lanzamos 403
        if (Auth::user()->role !== $role) {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
