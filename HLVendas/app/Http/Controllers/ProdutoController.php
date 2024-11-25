<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\ProdVenda;
use App\Models\ProdCompra;
use App\Models\MovimentoEstoque;
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

    public static function calcularEstoque(string $id){
        $produtos = Produto::findOrFail($id);
        $comprasProd = ProdCompra::all();
        $vendasProd = ProdVenda::all();
        $movimentoEstoque = MovimentoEstoque::all();
        $quantidadeCompras = 0;
        $quantidadeVendas = 0;
        $ultimoCusto = 0;
        $ultimaVenda = null;
        $ultimaCompra = null;

        foreach($comprasProd as $cProd){
            if($cProd->produtoid == $id){
                $quantidadeCompras += $cProd->quantidade;
                $ultimoCusto = $cProd->custo;
                $ultimaCompra = $cProd->updated_at;
            };
        }
        foreach($vendasProd as $vProd){
            if($vProd->produtoid == $id){
                $quantidadeVendas += $vProd->quantidade;
                $ultimaVenda = $vProd->updated_at;
            }
        }
        foreach($movimentoEstoque as $mov){
            if($mov->produtoid == $id){
                if($mov->tipomovimentacao == 'E'){
                    $quantidadeCompras += $mov->quantidade;
                }
                elseif($mov->tipomovimentacao == 'S'){
                    $quantidadeCompras -= $mov->quantidade;
                }
            }
        }

        $estoqueTotal = $quantidadeCompras - $quantidadeVendas;
        
        $produtos->estoque = $estoqueTotal;
        $produtos->ultimavenda = $ultimaVenda;
        $produtos->ultimacompra = $ultimaCompra;
        $produtos->custo = $ultimoCusto;
        $produtos->save();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produtos = Produto::findOrFail($id);
        return view('produto.edit', compact('produtos'));
    }

    public static function calcularPreco(float $custo, string $id)
    {
        
        $produtoAtt = Produto::findOrFail($id);

        $percCusto = $produtoAtt->perccusto;
        $percPrazo = $produtoAtt->percprazo;

        $novoPrecoAVista = $custo + ($custo * ($percCusto / 100));
        $novoPrecoAPrazo = $novoPrecoAVista + ($novoPrecoAVista * ($percPrazo / 100));

        $produtoAtt->update([
            'precoavista' => $novoPrecoAVista,
            'precoaprazo' =>  $novoPrecoAPrazo,
        ]);

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
        try {
            $produtos = Produto::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Produto não encontrado.',
                'produto_id' => $id,
            ], 404);
        }
    
        if (ProdVenda::produtoEmVenda($id)) {
            return response()->json([
                'error' => 'Este produto está associado a uma venda e não pode ser excluído.',
                'produto_nome' => $produtos->descricao,
            ], 400);
        }

        if (MovimentoEstoque::produtoTemMovimentoEstoque($id)) {
            return response()->json([
                'error' => 'Este produto está em movimento de estoque e não pode ser excluído.',
                'produto_nome' => $produtos->descricao,
            ], 400);
        }
    
        if (ProdCompra::produtoTemCompra($id)) {
            return response()->json([
                'error' => 'Este produto está associado a uma compra e não pode ser excluído.',
                'produto_nome' => $produtos->descricao,
            ], 400);
        }

        $produtos->delete();
    
        return response()->json([
            'success' => 'Produto excluído com sucesso.',
            'produto_nome' => $produtos->descricao,
        ], 200);
    }
}
