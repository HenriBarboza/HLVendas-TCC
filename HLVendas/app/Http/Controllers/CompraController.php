<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProdCompra;
use App\Models\Produto;
use App\Http\Controllers\ProdutoController;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Conta;
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
            // registra a compra
            Compra::create([
                'doc' => $request->input('doc'),
                'fornecedorid' => $request->input('fornecedorid'),
                'conta' => $request->input('conta'),
                'percdesconto' => $request->input('percdesconto'),
                'percadicional' => $request->input('percadicional'),
                'totalcompra' => $request->input('totalcompra'),
                'funcionarioid' => $request->input('funcionarioid')
            ]);


            foreach ($request->input('produtos') as $produto) {
                // registra os produtos da compra
                ProdCompra::create([
                    'compraid' => $request->input('doc'),
                    'produtoid' => $produto['produto_id'],
                    'quantidade' => $produto['quantidade'],
                    'custo' => $produto['custo'],
                ]);

                // acrescenta o estoque do produto e data da ultima compra no cadastro do produto
                $prodAtt = Produto::findOrFail($produto['produto_id']);
                $quantAtual = $prodAtt->estoque;
                $novoEstoque = $quantAtual + $produto['quantidade'];
                $prodAtt->update([
                    'custo' => $produto['custo'],
                    'estoque' => $novoEstoque,
                    'ultimacompra' => date("Y-m-d H:i:s")
                ]);

                ProdutoController::calcularPreco($produto['custo'], $produto['produto_id']);
            }


            $fornecedorAtt = Fornecedor::findOrFail($request->input('fornecedorid'));
            $totalAtual = $fornecedorAtt->totalvendido;
            $novoTotal = $totalAtual + $request->input('totalcompra');
            $fornecedorAtt->update([
                'ultimavenda' => date("Y-m-d H:i:s"),
                'totalvendido' => $novoTotal
            ]);

            $contaAtt = Conta::findOrFail($request->input('conta'));
            $totalConta = $contaAtt->total;
            $novoTotalc = $totalConta + $request->input('totalcompra');
            $contaAtt->update([
                'total' => $novoTotalc,
            ]);

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
