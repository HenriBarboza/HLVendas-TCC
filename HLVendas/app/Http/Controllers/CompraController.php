<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\prodCompra;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Http\Controllers\prodCompraController;
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::all();
        return view("compra.index", compact("compras"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodCompra = prodCompra::all();
        $doc = Compra::latest('doc')->first();
        if($doc == null){
            $doc = 1;
        } else{
        $doc = $doc ++;
        }
        return view('compra.create', compact("prodCompra", "doc"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Compra::create([
            'fornecedorid' => $request->input('fornecedorid'),
            'doc' => $request->input('doc'),
            'serie' => $request->input('serie'),
            'formapag' => $request->input('formapag'),
            'desconto' => $request->input('desconto'),
            'percdesc' => $request->input('percdesc'),
            'custadicional' => $request->input('custadicional'),
            'percadd' => $request->input('percadd'),
            'qtdprod' => $request->input('qtdprod'),
            'totalcompra' => $request->input('totalcompra'),
            'usuarioid' => $request->input('usuarioid')
        ]);

        return redirect()->route('compra.create')
                         ->with('success', "Compra registrada com sucesso");
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

    public function adicionarProdutos(int $compraid,int $produtoid, float $desconto,int $quantidade)
    {
        // prodCompraController::store($compraid, $produtoid, $desconto, $quantidade);
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
