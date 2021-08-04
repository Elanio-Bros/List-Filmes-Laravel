<?php

namespace Database\Factories;

use App\Models\Arquivos;
use App\Models\Filme;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArquivosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Arquivos::class;

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
            'tipo' => $this->faker->randomElement(['foto', 'video', 'capa']),
            'local' => 'dir_file',
            'propriedade' => $this->faker->randomElement(['url', 'file']),
        ];
    }
}
