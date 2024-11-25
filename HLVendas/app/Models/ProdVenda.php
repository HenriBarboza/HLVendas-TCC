<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdVenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'produtoid',
        'vendaid',
        'quantidade',
        'precovenda'
    ];
    public function produto()
    {
        return $this->belongsTo(Produto::class, foreignKey: 'produtoid');
    }
    public function venda()
    {
        return $this->belongsTo(Venda::class, 'vendaid');
    }
    public static function produtoEmVenda($produtoId)
    {
        // Verifica se o produto está associado a alguma venda
        return self::where('produtoid', $produtoId)->exists();
    }
}
