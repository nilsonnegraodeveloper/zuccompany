<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => 'Cliente teste',
            'cpf' => '000.000.000-00',
            'email' => 'teste@teste.com',
            'telefone' => '(00) 00000-0000',
            'endereco' => 'Rua Teste N° 0',
            'cidade' => 'Cidade Teste',
            'bairro' => 'Bairro Teste',
            'estado' => 'BA',
            'cep' => '00.000-000',
        ];
    }
}
