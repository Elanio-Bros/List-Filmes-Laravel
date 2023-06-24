<?php

namespace Database\Factories;

use App\Class\IMDB_API;
use App\Models\Filmes;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Filmes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $elements = [
            'tt1677720', 'tt2277860', 'tt0266543', 'tt3748528', 'tt0983193',
            'tt1675434', 'tt0446029', 'tt4633694', 'tt9362722', 'tt2250912',
            'tt0478970', 'tt5095030', 'tt0371746', 'tt1300854', 'tt1228705',
            'tt2245084', 'tt3606756', 'tt0317705', 'tt2096673', 'tt1049413',
            'tt0910970', 'tt0441773', 'tt1323594', 'tt0351283', 'tt0268380'
        ];

        $filmes = array_column(Filmes::select('imdb_code')->get()->toArray(), 'imdb_code');

        $elements = array_filter($elements, function ($value) use ($filmes) {
            return !in_array($value, $filmes);
        });

        $code = $this->faker->randomElement($elements);
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
