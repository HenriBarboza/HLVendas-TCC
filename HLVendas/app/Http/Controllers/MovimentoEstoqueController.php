<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProdutoController;
use App\Models\MovimentoEstoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimentoEstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estoque.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estoque.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        MovimentoEstoque::create([
            'motivo' => $request->input('motivo'),
            'produtoid' => $request->input('produtoid'),
            'quantidade' => $request->input('quantidade'),
            'observacao' => $request->input('observacao'),
            'tipomovimentacao' => $request->input('tipomovimentacao')
        ]);

        $produto = Produto::findOrFail($request->input('produtoid'));

        if ($request->input('tipomovimentacao') == 'E') {
            $produto->estoque +=  $request->input('quantidade');
            $produto->update();
        } elseif ($request->input('tipomovimentacao') == 'S') {
            $produto->estoque -= $request->input('quantidade');
            $produto->update();
        }

        return redirect()->route('estoque.create')
            ->with('success', "Movimento de estoque cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movimentos = MovimentoEstoque::findOrFail($id);
        return view('estoque.show', compact('movimentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movimentos = MovimentoEstoque::findOrFail($id);
        return view('estoque.edit', compact('movimentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movimentos = MovimentoEstoque::findOrFail($id);

        $produto = Produto::findOrFail($request->input('produtoid'));

        // Volta a quantidade da última movimentação
        if($movimentos->tipomovimentacao == 'E'){
            $produto->estoque -= $movimentos->quantidade;
        } 
        elseif($movimentos->tipomovimentacao == 'S'){
            $produto->estoque += $movimentos->quantidade;
        }

        // Calcula a nova quantidade de movimentação
        if ($request->input('tipomovimentacao') == 'E') {;
            $produto->estoque += $request->input('quantidade');
            $produto->update();
        } elseif ($request->input('tipomovimentacao') == 'S') {
            $produto->estoque -= $request->input('quantidade');
            $produto->update();
        }

        $movimentos->update($request->all());

        return redirect()->route('estoque.create')
            ->with('success', "Movimento de estoque atualizado com suceeso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movimentos = MovimentoEstoque::findOrFail($id);
        $produto = Produto::findOrFail($movimentos->produtoid);
        $movimentos->delete();

        ProdutoController::calcularEstoque($produto->id);

        return redirect()->route('estoque.create')
            ->with('success', "Movimento de estoque excluído com sucesso!");
    }
}
