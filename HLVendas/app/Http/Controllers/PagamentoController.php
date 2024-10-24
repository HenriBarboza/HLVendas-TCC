<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\CondicaoPagamento;

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
    public function create()
    {

        // static   string $docVenda

        $venda = Venda::findOrFail(13);
        $formaPagamentos = CondicaoPagamento::all();
        return view('pagamento.create', compact('venda','formaPagamentos' ));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $qntparcela = $request->input('quantparcelas');
        $qntdias = $request->input('diasparcelas');
        $dias = 0;

        if($qntparcela > 1){
            for($i = 1; $i <= $qntparcela; $i++ ){
                $dias += $qntdias;
                $parcela = $i.'/'.$qntparcela;
                $databaixa = date("d/m/Y", strtotime("+" . $dias . " days", strtotime(date("Y-m-d")))); 

    
                echo '<p> --------------------------- </p>' ;
                echo '<p>'.$parcela. '</p>' ;
                echo '<p>'. $databaixa. '</p>' ;
                echo '<p>'. $dias. '</p>' ;
            
            }
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
