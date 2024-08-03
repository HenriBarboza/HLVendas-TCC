<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view("cliente.index", compact('clientes'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
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

        return redirect()->route('cliente.create')
                         ->with('success', "Cliente cadastrado com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clientes = Cliente::findOrFail($id);
        return view('cliente.show', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clientes = Cliente::findOrFail($id);
        return view('cliente.edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clientes = Cliente::findOrFail($id);
        $clientes->update($request->all());

        return redirect()->route('cliente.create')
                         ->with('success', "Cliente alterado com sucesso!") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clientes = Cliente::findOrFail($id);
        $clientes->delete();

        return redirect()->route('cliente.create')
                        ->with('success','Cliente excluído com sucesso!') ;
    }
}
