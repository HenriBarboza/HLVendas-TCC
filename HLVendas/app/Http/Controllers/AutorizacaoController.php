<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AutorizacaoController extends Controller
{
    public function auth()
    {
        return view('verificacao.auth');
    }


    // Confirma a autenticação do gerente
    public function confirmarAuth(Request $request)
    {
        // Validação simples do formulário
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Verifica se o email corresponde a um gerente
        $gerente = User::whereHas('funcionario')->where('email', $request->email)->first();

        if ($gerente) {
            if ($gerente->funcionario->tipo == 'g') {
                if (Hash::check($request->password, $gerente->password)) {
                    session(['authorized_edit' => true]);

                    // Redireciona para a URL de onde o usuário veio ou para uma página padrão
                    $redirectTo = session()->pull('previous_url', view('home.index')); // Rota padrão de fallback
                    session()->forget('previous_url');
                    return redirect()->to($redirectTo);
                } else {
                    // Senha incorreta
                    return back()->withErrors(['erro' => 'E-mail ou senha incorretos.']);
                }
            } elseif ($gerente->funcionario->tipo == 'f') {
                return back()->withErrors(['erro' => 'O funcionário não tem permissão para liberar essa função.']);
            }
        } else {
            // Email não encontrado ou não é um gerente
            return back()->withErrors(['erro' => 'E-mail ou senha incorretos.']);
        }
    }

}
