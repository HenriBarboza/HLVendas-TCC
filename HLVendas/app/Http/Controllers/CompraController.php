<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProdCompra;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\DB;
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
        return view('compra.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $documentoExistente = Compra::where('doc', $request->input('doc'))->exists();

        if ($documentoExistente) {
            return redirect()->back()
                             ->with('error', "Erro ao cadastrar: Já existe um documento com esse código");

        }

        DB::beginTransaction();

        try {
            Compra::create([
                'doc' => $request->input('doc'),
                'fornecedorid' => $request->input('fornecedorid'),
                'serie' => $request->input('serie'),
                'formapg' => $request->input('formapg'),
                'desconto' => $request->input('desconto'),
                'percdesc' => $request->input('percdesc'),
                'custadicional' => $request->input('custadicional'),
                'percadd' => $request->input('percadd'),
                'qtdprod' => $request->input('qtdprod'),
                'totalcompra' => $request->input('totalcompra'),
                'funcionarioid' => $request->input('funcionarioid')
            ]);


            foreach ($request->input('produtos') as $produto) {
                ProdCompra::create([
                    'compraid' => $request->input('doc'),
                    'produtoid' => $produto['produto_id'],
                    'desconto' => $produto['desconto'],
                    'quantidade' => $produto['quantidade'],
                    'totalprod' => $produto['preco'],
                ]);

                $prodAtt = Produto::findOrFail($produto['produto_id']);
                $quantAtual = $prodAtt->estoque;
                $novoEstoque = $quantAtual + $produto['quantidade'];
                $prodAtt->update([
                    'estoque' => $novoEstoque,
                    'ultimacompra' => date("Y-m-d H:i:s")
                ]);

            }



            DB::commit();

            return redirect()->route(route: 'compra.create')
                ->with('success', "Compra registrada com sucesso");

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollback();

            // Opcional: registrar o erro ou fornecer feedback ao usuário
            // return redirect()->back()
            //     ->withErrors('Ocorreu um erro ao registrar a compra: ' . $e->getMessage());

            dd($e->getMessage());
        }
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

    public function adicionarProdutos(int $compraid, int $produtoid, float $desconto, int $quantidade)
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
