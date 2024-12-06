<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\User;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('funcionario.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Funcionario::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'cpfcnpj' => $request->input('cpfcnpj'),
            'logradouro' => $request->input('logradouro'),
            'bairro' => $request->input('bairro'),
            'numero' => $request->input('numero'),
            'cidade' => $request->input('cidade'),
            'cep' => $request->input('cep'),
            'estado' => $request->input('estado'),
            'status' => $request->input('status'),
            'datanasc' => $request->input('datanasc'),
            'tipo' => $request->input('tipo'),
            'idauth' => $request->input('idauth'),
        ]);

        $userid = $request->input('idauth');

        $user = User::findOrFail($userid);
        $user->update(['is_active' => 0]);


        return redirect()->route('funcionario.create')
            ->with('success', "Funcionario cadastrado com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $funcionarios = Funcionario::findOrFail($id);
        return view('funcionario.show', compact('funcionarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $funcionarios = Funcionario::findOrFail($id);
        return view('funcionario.edit', compact('funcionarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $funcionarios = Funcionario::findOrFail($id);
        $funcionarios->update($request->all());

        return redirect()->route('funcionario.create')
            ->with('success', "Funcionario alterado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $funcionario = Funcionario::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Funcionário não encontrado.',
                'funcionario_nome' => $id,
            ], 404);
        }

        if ($funcionario->vendas()->exists()) {
            return response()->json([
                'error' => 'Este Funcionário tem vendas associadas e não pode ser excluído.',
                'funcionario_nome' => $funcionario->nome,
            ], 400);
        }

        if (Funcionario::funcionarioTemCompra($id)) {
            return response()->json([
                'error' => 'Este funcionário está associado a compras e não pode ser excluído.',
                'funcionario_nome' => $funcionario->nome,
            ], 400);
        }

        $funcionario->delete();

        return response()->json([
            'success' => 'Funcionário excluído com sucesso.',
            'funcionario_nome' => $funcionario->nome,
        ], 200);
    }
}
