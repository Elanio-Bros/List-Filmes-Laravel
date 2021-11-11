<?php

namespace Database\Factories;

use App\Models\Grupos_Comentarios;
use App\Models\Filme;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class Grupos_ComentariosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grupos_Comentarios::class;

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
            'titulo' =>$this->faker->title(),
        ];
    }
}
