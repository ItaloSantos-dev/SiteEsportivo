<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VariacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_prod'=>1,
            'preco'=>124.90,
            'estoque'=>5,
            'quantidade'=>1,
            'unidade'=>"KG",
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
