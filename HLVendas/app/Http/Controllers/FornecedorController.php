<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use App\Models\Compra;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('fornecedor.create');
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
        Fornecedor::create([
            'nome'=> $request->input('nome'),
            'nomefantasia'=> $request->input('nomefantasia'),
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
        ]);

        return redirect()->route('fornecedor.create')
                         ->with('success', "Fornecedor cadastrado com sucesso.");
    }

    public static function calcularTotal(string $id){
        $fornecedor = Fornecedor::findOrFail($id);
        $compras = Compra::all();
        $totalCompras = 0;
        $ultimaData = null;

        foreach($compras as $compra){
            if($compra->fornecedorid == $id){
                $totalCompras += $compra->totalcompra;
                $ultimaData = $compra->created_at;
            }
        }

        $fornecedor->totalvendido = $totalCompras;
        $fornecedor->ultimavenda = $ultimaData;
        $fornecedor->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedores = Fornecedor::findOrFail($id);
        return view('fornecedor.show', compact('fornecedores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedores = Fornecedor::findOrFail($id);
        return view('fornecedor.edit', compact('fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedores = Fornecedor::findOrFail($id);
        $fornecedores->update($request->all());

        return redirect()->route('fornecedor.create')
                         ->with('success', "Fornecedor alterado com sucesso!") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedores = Fornecedor::findOrFail($id);
        $fornecedores->delete();

        return redirect()->route('fornecedor.create')
                        ->with('success','Fornecedor excluído com sucesso!') ;
    }
}
