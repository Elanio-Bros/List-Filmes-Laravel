<?php

namespace Database\Factories;

use App\Models\Categorias;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categorias::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->randomElement([
                'Aventura', 'Biográfico',
                'Comédia', 'Comédia Dramática', 'Comédia Romântica',
                'Histórico', 'Drama', 'Ficção'
            ]),
        ];
    }
}
