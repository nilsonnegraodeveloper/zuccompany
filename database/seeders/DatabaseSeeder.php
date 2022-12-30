<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\User::factory()->create();
        \App\Models\Cliente::factory()->create();
        \App\Models\FormaPagamento::factory(3)->create();
        \App\Models\Produto::factory(10)->create();
    }
}
