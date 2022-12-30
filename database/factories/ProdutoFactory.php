<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->lastName(),
            'quantidade' => $this->faker->randomDigit(),
            'preco' => $this->faker->randomDigit(),
            'observacao' => $this->faker->text(),
        ];
    }
}
