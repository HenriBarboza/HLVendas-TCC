<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodCompra extends Model
{
    use HasFactory;

    protected $fillable = ['produtoid','compraid' ,'quantidade', 'desconto', 'totalprod'];
}