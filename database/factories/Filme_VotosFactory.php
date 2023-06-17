<?php

namespace Database\Factories;

use App\Models\Filme_Votos;
use App\Models\Filme;
use App\Models\Filmes;
use App\Models\Usuario;
use App\Models\Usuarios;
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
                $usuarios = Usuarios::all();
                return $usuarios->count() === 0 ?
                    Usuarios::factory()->create()->id :
                    $this->faker->randomElement($usuarios)->id;
            },
            'id_filme' => function () {
                $filmes = Filmes::all();
                return $filmes->count() === 0 ?
                    Filmes::factory()->create()->id :
                    $this->faker->randomElement($filmes)->id;
            },
            'voto' => $this->faker->numberBetween(0,5),
        ];
    }
}
