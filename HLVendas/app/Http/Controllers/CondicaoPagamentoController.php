<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CondicaoPagamento;

class CondicaoPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('condicaoPagamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CondicaoPagamento::create([
            'descricao' => $request->input('descricao'),
            'quantparcelas' => $request->input('quantparcelas'),
            'diasparcelas' => $request->input('diasparcelas'),
            'alterarvalor' => $request->input('alterarvalor'),
        ]);

        return redirect()->route('condicaoPagamento.create')
                         ->with('success', "Condição de pagamento cadastrada com sucesso.");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}