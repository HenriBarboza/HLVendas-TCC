<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Cliente::all();
        return view("fornecedor.index", compact('fornecedores'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cliente::create([
            'nome'=> $request->input('nome'),
            'nfantasia'=> $request->input('nfantasia'),
            'telefone'=> $request->input('telefone'),
            'celular'=> $request->input('celular'),
            'cpfcnpj'=> $request->input('cpfcnpj'),
            'rgi'=> $request->input('rgi'),
            'logradouro'=> $request->input('logradouro'),
            'bairro'=> $request->input('bairro'),
            'numero'=> $request->input('numero'),
            'cidade'=> $request->input('cidade'),
            'cep'=> $request->input('cep'),
            'estado'=> $request->input('estado'),
            'pais'=> $request->input('pais'),
            'datanasc'=> $request->input('datanasc'),
            'tipo'=> $request->input('tipo'),
        ]);

        return redirect()->route('fornecedor.create')
                         ->with('success', "Fornecedor cadastrado com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedores = Cliente::findOrFail($id);
        return view('fornecedor.show', compact('fornecedores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedores = Cliente::findOrFail($id);
        return view('fornecedor.edit', compact('fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedores = Cliente::findOrFail($id);
        $fornecedores->update($request->all());

        return redirect()->route('fornecdor.create')
                         ->with('success', "Fornecedor alterado com sucesso!") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedores = Cliente::findOrFail($id);
        $fornecedores->delete();

        return redirect()->route('fornecdor.create')
                        ->with('success','Fornecdor excluído com sucesso!') ;
    }
}
