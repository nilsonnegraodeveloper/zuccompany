<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Venda;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable =
    [        
        'nome',
        'cpf',
        'email',
        'endereco',
        'complemento',
        'bairro',
        'cidade',
        'cep',
        'estado'
    ]; 

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'cliente_id');
    }
}
