<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    protected $model=Produto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=>$this->faker->word(),
            'marca_id'=>$this->faker->numberBetween(1,5),
            'subcategoria_id'=>$this->faker->numberBetween(1,5),
            'imagem'=>$this->faker->imageUrl(200,200),
            'desc'=>$this->faker->paragraph()

        ];
    }
}
