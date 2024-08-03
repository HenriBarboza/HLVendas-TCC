<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome','nfantasia' ,'telefone','celular' ,'cpfcnpj', 'rgi', 'logradouro', 'bairro', 'numero', 'cidade' ,'cep' ,'estado', 'pais', 'datanasc', 'tipo'];
}
