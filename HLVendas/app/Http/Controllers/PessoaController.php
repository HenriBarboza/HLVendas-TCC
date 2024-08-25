<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pessoa::create([
            'nome'=> $request->input('nome'),
            'nfantasia'=> $request->input('nfantasia'),
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
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pessoas = Pessoa::findOrFail($id);
        $pessoas->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pessoas = Pessoa::findOrFail($id);
        $pessoas->delete();
    }
}
