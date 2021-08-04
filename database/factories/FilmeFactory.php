<?php

namespace Database\Factories;

use App\Models\Filme;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Filme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->title(),
            'classificação_idade' => $this->faker->randomElement(['L', '10', '12', '14', '16', '18']),
            'metacritic'=>$this->faker->randomDigit(),
            'descrição' => 'descrição',
        ];
    }
}
