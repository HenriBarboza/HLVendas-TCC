<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PessoaController;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Pessoa;

class FornecedorController extends PessoaController
{
    public function index()
    {
        return view("fornecedor.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimoid = Pessoa::latest('id')->first();
        if($ultimoid != null) {
            $novoid = $ultimoid->id + 1;
        } else{
            $novoid = 1;
        }
        return view('fornecedor.create', compact('novoid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        parent::store($request);
        Fornecedor::create([
            'idpessoa' => $request->input('idpessoa'),
        ]);

        return redirect()->route('fornecedor.create')
                         ->with('success', "Fornecedor cadastrado com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedores = Fornecedor::with('pessoa')->findOrFail($id);
        return view('fornecedor.show', compact('fornecedores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedores = Fornecedor::with('pessoa')->findOrFail($id);
        return view('fornecedor.edit', compact('fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedores = Fornecedor::with('pessoa')->findOrFail($id);
        parent::update($request, $fornecedores->pessoa->id);
        $fornecedores->update($request->all());

        return redirect()->route('fornecedor.create')
                         ->with('success', "Fornecedor alterado com sucesso!") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedores = Fornecedor::with('pessoa')->findOrFail($id);
        parent::destroy($fornecedores->pessoa->id);

        return redirect()->route('fornecedor.create')
                        ->with('success','Fornecdor excluído com sucesso!') ;
    }
}
