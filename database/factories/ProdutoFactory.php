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
            'nome'=>"WHEY PROTEIN GROWTH. PROTEÍNA DO SORO DO LEITE PURA.",
            'marca_id'=>1,
            'subcategoria_id'=>$this->faker->numberBetween(1,5),
            'imagem'=>"https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR3_UpVGDUX8uVmriypER2_eAYvoGUyDdJTKtlP8Lie4Ht9OS3poQEjmQd5nNeCJAPy658Sg3qqcKYd9m5pmgu61ceI-WazxaVgvKpaNTOdZ9TYeRFi57rmSEeSNN8Bw4ZEp1seJy7NTA&usqp=CAc",
            'desc'=>"Whey protein Growth fornece proteínas para quem deseja hipertrofia e definição muscular, e ele é totalmente sem blends ou adição de outras proteínas.",
            'created_at'=>now(),
            'updated_at'=>now()


        ];
    }
}
