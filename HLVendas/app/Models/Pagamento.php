<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendaid',
        'vendadoc',
        'numerotransacao',
        'valorvenda',
        'valorparcela',
        'valorpago',
        'tabelapreco',
        'databaixa',
        'condicaopagid',
        'parcela',
        'trocovenda',
    ];

    public function condicaoPagamento()
    {
        return $this->belongsTo(CondicaoPagamento::class, 'condicaopagid');
    }
    public function venda()
    {
        return $this->belongsTo(Venda::class, 'vendaid');
    }
}
