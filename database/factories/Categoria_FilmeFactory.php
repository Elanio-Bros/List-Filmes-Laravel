<?php

namespace Database\Factories;

use App\Models\Categoria_Filme;
use App\Models\Filme;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class Categoria_FilmeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categoria_Filme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_filme' => function () {
                $filmes = Filme::all();
                return $filmes->count() === 0 ?
                    Filme::factory()->create()->id :
                    $this->faker->randomElement($filmes)->id;
            },
            'id_categoria' => function () {
                $categorias = Categoria::all();
                return $categorias->count() === 0 ?
                    Filme::factory()->create()->id :
                    $this->faker->randomElement($categorias)->id;
            },
        ];
    }
}
