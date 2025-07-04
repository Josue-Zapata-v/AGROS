<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolComprador
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->rol === 'comprador') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Acceso no autorizado. Solo compradores pueden acceder.');
    }
}
