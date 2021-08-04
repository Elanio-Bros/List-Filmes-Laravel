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
            'filme' => function () {
                $filmes = Filme::all();
                if ($filmes->count() === 0) {
                    return Filme::factory()->create()->idFilme;
                } else {
                    return $this->faker->randomElement($filmes)->idFilme;
                }
            },
            'categoria' => function () {
                $categoria = Categoria::all();
                if ($categoria->count() === 0) {
                    return Categoria::factory()->create()->idCategoria;
                } else {
                    return $this->faker->randomElement($categoria)->idCategoria;
                }
            },
        ];
    }
}
