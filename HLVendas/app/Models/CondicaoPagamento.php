<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicaoPagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'quantparcelas',
        'diasparcelas',
        'alterarvalor'
    ];
}
