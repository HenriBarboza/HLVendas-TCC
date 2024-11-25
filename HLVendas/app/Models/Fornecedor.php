<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nomefantasia',
        'telefone',
        'cpfcnpj',
        'logradouro',
        'bairro',
        'numero',
        'cidade',
        'cep',
        'estado',
        'ultimavenda',
        'totalvendido'
    ];

    public function compras()
{
    return $this->hasMany(Compra::class, 'fornecedorid'); // 'fornecedorid' deve corresponder à chave estrangeira na tabela de compras
}
}
