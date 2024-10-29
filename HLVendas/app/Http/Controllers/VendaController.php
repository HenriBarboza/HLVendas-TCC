<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdVenda;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\PagamentoController;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\Cliente;
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
            Venda::create([
                'doc' => $request->input('doc'),
                'clienteid' => $request->input('clienteid'),
                'pagamentoid' => 1,
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
            }

            DB::commit();
            
            foreach ($request->input('produtos') as $produto) {
                ProdutoController::calcularEstoque($produto['produto_id']);
            }
            ClienteController::calcularTotal($request->input('clienteid'));
            ContaController::calcularTotal($request->input('contaid'));

            return PagamentoController::create($request->input('doc'));

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

        ContaController::calcularTotal($request->input('contaid'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::beginTransaction();

        // try {
        //     $venda = Venda::with('cliente', 'conta')->findOrFail($id);
        //     $produtosVenda = ProdVenda::where('vendaid', $venda->id)->get();
        // }
    }
}
