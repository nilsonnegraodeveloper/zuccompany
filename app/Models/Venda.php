<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Cliente;
use \App\Models\Produto;
use \App\Models\FormaPagamento;

class Venda extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'cliente_id',
        'produto_id',
        'forma_pagamento_id',
        'quantidade',
        'preco_unitario',
        'preco_total'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'product_id');
    }

    public function formaPagamento()
    {
        return $this->belongsTo(FormaPagamento::class, 'forma_pagamento_id');
    }
}
