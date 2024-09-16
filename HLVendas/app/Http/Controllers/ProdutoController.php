<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produto.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produto::create([
            'descricao' => $request->input('descricao'),
            'custo' => $request->input('custo'),
            'perccusto' => $request->input('perccusto'),
            'percprazo' => $request->input('percprazo'),
            'precoavista' => $request->input('precoavista'),
            'precoaprazo' => $request->input('precoaprazo'),
            'unidade' => $request->input('unidade'),
            'codigoBarras' => $request->input('codigoBarras'),
            'ultimavenda' => $request->input('ultimavenda'),
            'ultimacompra' => $request->input('ultimacompra'),
            'categoria' => $request->input('categoria')
        ]);

        return redirect()->route('produto.create')
                         ->with('success', "Produto cadastrado com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produtos = Produto::findOrFail($id);
        return view('produto.show', compact('produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produtos = Produto::findOrFail($id);
        return view('produto.edit', compact('produtos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produtos = Produto::findOrFail($id);
        $produtos->update($request->all());

        return redirect()->route('produto.create')
                         ->with('success', 'Produto alterado com suceeso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produtos = Produto::findOrFail($id);
        $produtos->delete();

        return redirect()->route('produto.create')
                         ->with('success', "Produto excluído com sucesso!");
    }
}
