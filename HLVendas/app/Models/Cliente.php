<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'cpfcnpj',
        'logradouro',
        'bairro',
        'numero',
        'cidade',
        'cep',
        'estado',
        'datanasc',
        'ultimacompra',
        'totalgasto'
    ];

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'clienteid');  // 'clienteid' é a chave estrangeira na tabela de vendas
    }
}
