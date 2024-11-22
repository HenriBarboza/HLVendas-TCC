<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
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
        'idauth'
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class, 'idauth');
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'funcionarioid');  // 'clienteid' é a chave estrangeira na tabela de vendas
    }
}

