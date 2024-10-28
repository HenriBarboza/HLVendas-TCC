<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendaid',
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
}
