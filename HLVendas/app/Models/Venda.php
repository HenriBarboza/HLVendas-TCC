<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $fillable = [
        'clienteid',
        'doc',
        'contaid',
        'condicaopagid',
        'tabelapreco',
        'percdesconto',
        'percadicional',
        'totalvenda',
        'funcionarioid'
    ];
    public function prodVendas()
    {
        return $this->hasMany(ProdVenda::class, 'vendaid', 'doc');
    }
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionarioid');
    }
    public function conta()
    {
        return $this->belongsTo(Conta::class, 'contaid');
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clienteid');
    }
    public function condicaoPagamento()
    {
        return $this->belongsTo(CondicaoPagamento::class, 'condicaopagid');
    }
}
