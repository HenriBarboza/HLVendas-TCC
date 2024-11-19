<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdVenda;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\PagamentoController;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\Pagamento;
use App\Models\Conta;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contas = Conta::all();
        return view('venda.create', compact('contas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contas = Conta::all();
        return view('venda.create', compact('contas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $documentoExistente = Venda::where('doc', $request->input('doc'))->exists();

        if ($documentoExistente) {
            return redirect()->back()
                ->with('error', "Erro ao cadastrar: Já existe um documento com esse código");
        }

        DB::beginTransaction();

        try {
            $venda = Venda::create([
                'doc' => $request->input('doc'),
                'clienteid' => $request->input('clienteid'),
                'contaid' => $request->input('contaid'),
                'percdesconto' => $request->input('percdesconto'),
                'tabelapreco' => $request->input('tabelapreco'),
                'percadicional' => $request->input('percadicional'),
                'totalvenda' => $request->input('totalvenda'),
                'funcionarioid' => $request->input('funcionarioid')
            ]);

            foreach ($request->input('produtos') as $produto) {
                // Registra os produtos da venda
                ProdVenda::create([
                    'vendaid' => $request->input('doc'),
                    'produtoid' => $produto['produto_id'],
                    'quantidade' => $produto['quantidade'],
                    'precovenda' => $produto['preco'],
                ]);

                //Subtrai a quantidade da venda e atualiza a data da última venda no cadastro do produto
                $prodAtt = Produto::findOrFail($produto['produto_id']);
                $quantAtual = $prodAtt->estoque;
                $novoEstoque = $quantAtual - $produto['quantidade'];
                $prodAtt->update([
                    'estoque' => $novoEstoque,
                    'ultimavenda' => date("Y-m-d H:i:s")
                ]);
            }

            DB::commit();
            ClienteController::calcularTotal($request->input('clienteid'));
            ContaController::calcularTotal($request->input('contaid'));

            \Log::info('Transação concluída com sucesso para a venda ID: ' . $venda->id);

            return PagamentoController::create($venda->id);

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollback();

            // Opcional: registrar o erro ou fornecer feedback ao usuário
            // return redirect()->back()
            //     ->withErrors('Ocorreu um erro ao registrar a venda: ' . $e->getMessage());

            dd($e->getMessage()); // remover antes de entregar o TCC
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venda = Venda::with(['cliente', 'funcionario', 'conta'])->findOrFail($id);
        if ($venda->condicaopagid == null) {
            return PagamentoController::create($venda->id);
        }
        $produtos = ProdVenda::where('vendaid', $venda->doc)->with('produto')->get();
        return view('venda.show', compact('venda', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venda = Venda::with(['cliente', 'funcionario', 'conta'])->findOrFail($id);
        $produtos = ProdVenda::where('vendaid', $venda->doc)->with('produto')->get();
        $contas = Conta::all();
        return view('venda.edit', compact('venda', 'produtos', 'contas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $venda = Venda::findOrFail($id);
        $pagamentos = Pagamento::where('vendaid', $id)->get();
        $venda->prodVendas()->delete();

        foreach ($request->input('produtos') as $produto) {
            $venda->prodVendas()->create([
                'produtoid' => $produto['produto_id'],
                'quantidade' => $produto['quantidade'],
                'precovenda' => $produto['preco'],
                'vendaid' => $venda->doc,
            ]);

            $prodAtt = Produto::findOrFail($produto['produto_id']);
            $quantAtual = $prodAtt->estoque;
            $novoEstoque = $quantAtual - $produto['quantidade'];
            $prodAtt->update([
                'estoque' => $novoEstoque,
                'ultimavenda' => date("Y-m-d H:i:s")
            ]);
        }
        $venda->update($request->all());
        foreach ($pagamentos as $pagamento){
            $pagamento->delete();
        }

        ContaController::calcularTotal($request->input('contaid'));
        ClienteController::calcularTotal($request->input('clienteid'));

        return PagamentoController::create($venda->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $venda = Venda::with('cliente', 'conta')->findOrFail($id);
            $produtosVenda = ProdVenda::where('vendaid', $venda->doc)->get();
            $pagamentos = Pagamento::where('vendaid', $id)->get();

            $cliente = $venda->cliente;
            $conta = $venda->conta;
            ContaController::calcularTotal($conta->id);
            ClienteController::calcularTotal($cliente->id);

            foreach ($produtosVenda as $prodVenda) {
                $produto = $prodVenda->produto;
                ProdutoController::calcularEstoque($produto->id);
                $prodVenda->delete();
            }
            foreach ($pagamentos as $pagamento) {
                $pagamento->delete();
            }
            $venda->delete();


            DB::commit();

            return redirect()->route('venda.create')->with('success', "Venda removida com sucesso");
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->withErrors('ocorreu um erro ao remover a venda: ' . $e->getMessage());
        }
    }
}
