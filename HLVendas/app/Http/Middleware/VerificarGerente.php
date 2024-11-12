<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarGerente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        $restrictedRoutes = ['venda.edit', 'compra.edit'];
        if ($user->funcionario && $user->funcionario->tipo != 'g') {
            if (in_array($request->route()->getName(), $restrictedRoutes)) {
                if (!session('authorized_edit', false)) {
                    session(['previous_url' => url()->current()]);
                    return redirect()->route('verificacao.auth')
                        ->withErrors(['erro' => 'Acesso restrito. Autorização necessária.']);
                }
            }
            session()->forget('authorized_edit');
        }
        return $next($request);
    }
}
