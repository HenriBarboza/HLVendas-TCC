<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Venda;
use Illuminate\Http\Request;
use App\Http\Controllers\AutorizacaoController;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cliente.create');
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
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'cpfcnpj' => $request->input('cpfcnpj'),
            'rgi' => $request->input('rgi'),
            'logradouro' => $request->input('logradouro'),
            'bairro' => $request->input('bairro'),
            'numero' => $request->input('numero'),
            'cidade' => $request->input('cidade'),
            'cep' => $request->input('cep'),
            'estado' => $request->input('estado'),
            'datanasc' => $request->input('datanasc'),
        ]);

        return redirect()->route('cliente.create')
            ->with('success', "Cliente cadastrado com sucesso.");
    }

    public static function calcularTotal(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $vendas = Venda::all();
        $totalVendas = 0;
        $ultimaData = null;

        foreach ($vendas as $venda) {
            if ($venda->clienteid == $id) {
                $totalVendas += $venda->totalvenda;
                $ultimaData = $venda->created_at;
            }
        }

        $cliente->totalgasto = $totalVendas;
        $cliente->ultimacompra = $ultimaData;
        $cliente->save();
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
            ->with('success', "Cliente alterado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Cliente não encontrado.',
                'cliente_nome' => $id,
            ], 404);
        }

        if ($cliente->vendas()->exists()) {
            return response()->json([
                'error' => 'Este cliente tem vendas associadas e não pode ser excluído.',
                'cliente_nome' => $cliente->nome,
            ], 400);
        }

        $cliente->delete();

        return response()->json([
            'success' => 'Cliente excluído com sucesso.',
            'cliente_nome' => $cliente->nome,
        ], 200);
    }
}
