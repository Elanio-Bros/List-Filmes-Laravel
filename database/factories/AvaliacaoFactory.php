<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvaliacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Avaliacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user' => function () {
                $filmes = User::all();
                if ($filmes->count() === 0) {
                    return User::factory()->create()->id;
                } else {
                    return $this->faker->randomElement($filmes)->idUser;
                }
            },
            'filme' => function () {
                $filmes = Filme::all();
                if ($filmes->count() === 0) {
                    return Filme::factory()->create()->id;
                } else {
                    return $this->faker->randomElement($filmes)->idFilme;
                }
            },
            'comentario' => 'Avalição',
            'pontuação' => 4,
            'curtidas' => 1,
        ];
    }
}
