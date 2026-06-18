<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    //função que o framework usa automaticamente quando o middleware é chamado
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Se o usuário não estiver logado ou não tiver a role necessária
        if (!$request->user() || $request->user()->role !== $role) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
