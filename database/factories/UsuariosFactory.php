<?php

namespace Database\Factories;

use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuarios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'usuario' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'senha' => Hash::make('senhaTeste'),
            'tipo' => $this->faker->randomElement(['Admin','Gerente','Normal']),
        ];
    }
}
