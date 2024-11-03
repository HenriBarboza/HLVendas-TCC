<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\CondicaoPagamento;
use App\Models\Pagamento;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public static function create(string $idVenda)
    {
        $venda = Venda::findOrFail($idVenda);
        $formaPagamentos = CondicaoPagamento::all();
        return view('pagamento.create', compact('venda','formaPagamentos' ));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vendaid = $request->input('vendaid');
        $doc = $request->input('doc');
        $qntparcela = $request->input('quantparcelas');
        $qntdias = $request->input('diasparcelas');
        $valortotal = $request->input('valortotal');
        $valorpago = $request->input('valorpago');
        $troco = $request->input('troco');
        $tabelapreco = $request->input('tabelapreco');
        $tabelapreco = $request->input('tabelapreco');
        $numerotransacao = $request->input('numerotransacao');
        $formapag = $request->input('condicaopagid');

        $dias = 0;
        $valorParcela = round($valortotal /  $qntparcela, 2);

        
        if($qntparcela > 1){
            for($i = 1; $i <= $qntparcela; $i++ ){
                $dias += $qntdias;
                $parcela = $i.'/'.$qntparcela;
                $databaixa = date("Y-m-d", strtotime("+" . $dias . " days", strtotime(date("Y-m-d"))));
    
                Pagamento::create([
                    'vendaid'=> $vendaid,
                    'vendadoc'=> $doc,
                    'numerotransacao'=>$numerotransacao,
                    'valorvenda'=>$valortotal,
                    'valorpago'=>$valorpago,
                    'valorparcela'=>$valorParcela,
                    'tabelapreco'=>$tabelapreco,
                    'databaixa'=>$databaixa,
                    'condicaopagid'=>$formapag,
                    'parcela'=>$parcela,
                    'trocovenda'=>$troco
                ]);
            }
        }else{
            $databaixa = date("Y-m-d"); 
            $parcela = '1/1';

            Pagamento::create([
                'vendaid'=> $vendaid,
                'vendadoc'=> $doc,
                'numerotransacao'=>$numerotransacao,
                'valorvenda'=>$valortotal,
                'valorparcela'=>$valorParcela,
                'valorpago'=>$valorpago,
                'tabelapreco'=>$tabelapreco,
                'databaixa'=>$databaixa,
                'condicaopagid'=>$formapag,
                'parcela'=>$parcela,
                'trocovenda'=>$troco
            ]);
        }

        $venda = Venda::findOrFail($vendaid);
        $venda->update([
            'condicaopagid' => $formapag
        ]);

        return redirect()->route('pagamento.show', $vendaid)
                         ->with('success', "Venda e pagamento cadastrados com sucesso.")  ;     

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pagamentos = Pagamento::where('vendaid', $id)->get();
        return view('pagamento.show', compact('pagamentos'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
