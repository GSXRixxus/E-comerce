<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('usuario')) {
            return redirect()->route('login')
                ->with('error', 'Por favor inicia sesión para acceder');
        }

        return $next($request);
    }
}