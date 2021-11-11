<?php

namespace Database\Factories;

use App\Models\Filme_Votos;
use App\Models\Filme;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class Filme_VotosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Filme_Votos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usuario' => function () {
                $usuarios = Usuario::all();
                return $usuarios->count() === 0 ?
                    Usuario::factory()->create()->id :
                    $this->faker->randomElement($usuarios)->id;
            },
            'id_filme' => function () {
                $filmes = Filme::all();
                return $filmes->count() === 0 ?
                    Filme::factory()->create()->id :
                    $this->faker->randomElement($filmes)->id;
            },
            'voto' => $this->faker->numberBetween(0,5),
        ];
    }
}
