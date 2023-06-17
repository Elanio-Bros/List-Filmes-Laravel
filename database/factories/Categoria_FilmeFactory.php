<?php

namespace Database\Factories;

use App\Models\Categoria_Filme;
use App\Models\Categorias;
use App\Models\Filmes;
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
                $filmes = Filmes::all();
                return $filmes->count() === 0 ?
                    Filmes::factory()->create()->id :
                    $this->faker->randomElement($filmes)->id;
            },
            'id_categoria' => function () {
                $categorias = Categorias::all();
                return $categorias->count() === 0 ?
                    Filmes::factory()->create()->id :
                    $this->faker->randomElement($categorias)->id;
            },
        ];
    }
}
