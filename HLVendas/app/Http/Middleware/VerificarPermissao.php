<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarPermissao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        $bloqueioRotas = ['compra.index','compra.create', 'compra.show', 'compra.edit','conta.index', 'conta.create', 'conta.edit', 'conta.delete', 'conta.show',
                          'funcionario.index', 'funcionario.create', 'funcionario.edit', 'funcionario.delete', 'funcionario.show',
                          'condicaoPagamento.index', 'condicaoPagamento.create', 'condicaoPagamento.edit', 'condicaoPagamento.delete', 'condicaoPagamento.show'];
        if ($user->funcionario && $user->funcionario->tipo != 'g') {
            if (in_array($request->route()->getName(), $bloqueioRotas)) {
                if (!session('authorized_edit', false)) {
                    session(['previous_url' => url()->current()]);
                    return redirect()->route('permissao.index');
                }
            }
        }
        return $next($request);
    }
}
