<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['fornecedorid', 'doc', 'serie', 'formapg', 'desconto', 'percdesc', 'custadicional', 'percadd','datacompra' ,'totalcompra' ,'funcionarioid'];
}
