<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->tipo === 'admin') {
            return $next($request);
        }

        // Se não for admin, chuta ele para a tela correta ou dá erro 403
        return redirect('/login')->with('error', 'Acesso negado.');
    }
}
