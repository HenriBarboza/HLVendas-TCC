<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conta;
use App\Models\Compra;
use App\Models\Venda;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('conta.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Conta::create([
            'nome' => $request->input('nome'),
            'funcionarioid' => $request->input('funcionarioid')
        ]);

        return redirect()->route('conta.create')
                         ->with('success', "Conta cadastrada com sucesso.");
    }

    public static function calcularTotal(string $id)
    {
        $conta = Conta::findOrFail( $id);
        $vendas = Venda::all();
        $compras = Compra::all();
        $totalVenda = 0;
        $totalCompra = 0;

        foreach($vendas as $venda){
            if($venda->contaid == $id){
                $totalVenda += $venda->totalvenda;
            };
        }
        foreach($compras as $compra){
            if($compra->contaid == $id){
                $totalCompra -= $compra->totalcompra;
            };
        }
        $totalConta = $totalVenda + $totalCompra;


        $conta->total = $totalConta;
        $conta->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contas = Conta::findOrFail($id);
        $compras = Compra::where('contaid', $contas->id)->with('conta')->get();
        $vendas = Venda::where('contaid', $contas->id)->with('conta')->get();
        return view('conta.show', compact('contas', 'compras', 'vendas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contas = Conta::findOrFail($id);
        return view('conta.edit', compact('contas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $conta = Conta::findOrFail($id);
        $conta->update($request->all());
        return redirect()->route('conta.create')
                         ->with('success', "Conta alterado com sucesso!") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
