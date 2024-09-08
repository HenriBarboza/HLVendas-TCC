<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;

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
            'nome'=> $request->input('nome'),
            'email'=> $request->input('email'),
            'telefone'=> $request->input('telefone'),
            'cpfcnpj'=> $request->input('cpfcnpj'),
            'logradouro'=> $request->input('logradouro'),
            'bairro'=> $request->input('bairro'),
            'numero'=> $request->input('numero'),
            'cidade'=> $request->input('cidade'),
            'cep'=> $request->input('cep'),
            'estado'=> $request->input('estado'),
            'datanasc'=> $request->input('datanasc'),
            'tipo'=> $request->input('tipo'),
            'idauth'=> $request->input('idauth'),
        ]);

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
                         ->with('success', "Funcionario alterado com sucesso!") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $funcionarios = Funcionario::findOrFail($id);
        $funcionarios->delete();

        return redirect()->route('funcionario.create')
                        ->with('success','Funcionario excluído com sucesso!') ;
    }
}