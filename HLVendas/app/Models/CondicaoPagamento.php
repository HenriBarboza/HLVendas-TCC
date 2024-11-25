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

    public function pagamentos()
{
    return $this->hasMany(Pagamento::class, 'condicaopagid'); // 'fornecedorid' deve corresponder à chave estrangeira na tabela de compras
}
}
