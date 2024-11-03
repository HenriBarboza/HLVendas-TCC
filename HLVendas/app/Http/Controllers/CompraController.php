<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProdCompra;
use App\Models\Produto;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\FornecedorController;
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
        $contas = Conta::all();
        return view('compra.create', compact('contas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contas = Conta::all();
        return view('compra.create', compact('contas'));
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
                'contaid' => $request->input('contaid'),
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

            }

            DB::commit();

            foreach ($request->input('produtos') as $produto) {
                ProdutoController::calcularEstoque($produto['produto_id']);
            }
            FornecedorController::calcularTotal($request->input('fornecedorid'));
            ContaController::calcularTotal($request->input('contaid'));
            ProdutoController::calcularPreco($produto['custo'], $produto['produto_id']);

            return redirect()->route(route: 'compra.create')
                ->with('success', "Compra registrada com sucesso");

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollback();

            // Opcional: registrar o erro ou fornecer feedback ao usuário
            // return redirect()->back()
            //     ->withErrors('Ocorreu um erro ao registrar a compra: ' . $e->getMessage());

            dd($e->getMessage()); // remover antes de entregar o TCC
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compra = Compra::with(['fornecedor', 'funcionario', 'conta'])->findOrFail($id);
        $produtos = ProdCompra::where('compraid', $compra->doc)->with('produto')->get();
        return view('compra.show', compact('compra', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $compra = Compra::with('fornecedor', 'conta')->findOrFail($id);
        $produtos = ProdCompra::where('compraid', $compra->doc)->with('produto')->get();
        $contas = Conta::all();
        return view('compra.edit', compact('compra', 'produtos', 'contas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Encontra a compra a ser atualizada
        $compra = Compra::findOrFail($id);

        // Limpa os produtos existentes
        $compra->prodCompras()->delete();

        // Adiciona os novos produtos
        foreach ($request->input('produtos') as $produto) {

            $compra->prodCompras()->create([
                'produtoid' => $produto['produto_id'],
                'quantidade' => $produto['quantidade'],
                'custo' => $produto['custo'],
                'compraid' => $compra->doc,
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

        $compra->update($request->all());
        ContaController::calcularTotal($request->input('contaid'));
        FornecedorController::calcularTotal($request->input(key: 'fornecedorid'));

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('compra.index')->with('success', 'Compra atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $compra = Compra::with('fornecedor', 'conta')->findOrFail($id);
            $produtosCompra = ProdCompra::where('compraid', $compra->doc)->get();

            // Reverter saldo do fornecedor e caixa
            $fornecedor = $compra->fornecedor;
            $conta = $compra->conta;
            ContaController::calcularTotal($conta->id);
            FornecedorController::calcularTotal($fornecedor->id);

            // Atualizar o estoque dos produtos
            foreach ($produtosCompra as $prodCompra) {
                $produto = $prodCompra->produto;
                ProdutoController::calcularEstoque($produto->id);
                $prodCompra->delete();
            }

            // Excluir a compra
            $compra->delete();

            DB::commit();

            return redirect()->route('compra.create')->with('success', "Compra removida com sucesso");
        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollback();

            return redirect()->back()->withErrors('Ocorreu um erro ao remover a compra: ' . $e->getMessage());
        }
    }
}
