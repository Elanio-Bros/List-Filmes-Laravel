<?php

namespace Database\Factories;

use App\Models\Filme;
use App\Class\IMDB_API;
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
        $code = $this->faker->randomElement(['tt2277860', 'tt0266543', 'tt1677720', 'tt3748528', 'tt0983193']);
        $imdb = new IMDB_API();
        $datasMovie = $imdb->getDatasFilmesCode($code);
        return [
            'imdb_code' => $code,
            'titulo' => $datasMovie['titulo'],
            'tipo_capa' => 'imdb',
            'capa_url' => $datasMovie['imagem'],
            'nota_imdb' => $datasMovie['nota'],
            'descricao' => 'Filme Factory Descrição Teste',
        ];
    }
}
