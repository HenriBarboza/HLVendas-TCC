<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Fornecedor;


class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nfantasia',
        'telefone',
        'cpfcnpj',
        'logradouro',
        'bairro',
        'numero',
        'cidade',
        'cep',
        'estado',
        'datanasc',
        'tipo',
    ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'idpessoa', 'id');
    }
    public function fornecedor()
    {
        return $this->hasOne(Fornecedor::class, 'idpessoa', 'id');
    }
}
