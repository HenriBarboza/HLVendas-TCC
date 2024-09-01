<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PessoaController;
use App\Models\Cliente;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class ClienteController extends PessoaController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $clientes = Cliente::all();
        // $rota = 'show';
        return view("cliente.index");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimoid = Pessoa::latest('id')->first();
        if ($ultimoid != null) {
            $novoid = $ultimoid->id + 1;
        } else{
            $novoid = 1;
        }
        return view('cliente.create', compact('novoid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pessoa = parent::store($request);
        // Cliente::create([
        //     // 'idpessoa' => $request->input('idpessoa'),
        //     'idpessoa' => $pessoa->id,

        // ]);

        return redirect()->route('cliente.create')
            ->with('success', "Cliente cadastrado com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clientes = Cliente::with('pessoa')->findOrFail($id);
        return view('cliente.show', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clientes = Cliente::with('pessoa')->findOrFail($id);
        return view('cliente.edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clientes = Cliente::with('pessoa')->findOrFail($id);
        parent::update($request, $clientes->pessoa->id);
        $clientes->update($request->all());

        return redirect()->route('cliente.create')
            ->with('success', "Cliente alterado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clientes = Cliente::with('pessoa')->findOrFail($id);
        parent::destroy($clientes->pessoa->id);

        return redirect()->route('cliente.create')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}
