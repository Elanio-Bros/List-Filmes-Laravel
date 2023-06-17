<?php

namespace Database\Factories;

use App\Models\Comentarios;
use App\Models\Grupos_Comentarios;
use App\Models\Usuario;
use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentariosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentarios::class;

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
            'id_grupo' => function () {
                $grupos = Grupos_Comentarios::all();
                return $grupos->count() === 0 ?
                    Grupos_Comentarios::factory()->create()->id :
                    $this->faker->randomElement($grupos)->id;
            },
            'comentario' => $this->faker->realText(),
        ];
    }
}
