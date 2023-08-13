<?php

namespace Database\Seeders;

use App\Class\IMDB_API;
use App\Models\Filmes;
use Illuminate\Database\Seeder;

class FilmesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $elements = [
            'tt1677720', 'tt2277860', 'tt0266543', 'tt3748528', 'tt0983193',
            'tt1675434', 'tt0446029', 'tt4633694', 'tt9362722', 'tt2250912',
            'tt0478970', 'tt5095030', 'tt0371746', 'tt1300854', 'tt1228705',
            'tt2245084', 'tt3606756', 'tt0317705', 'tt2096673', 'tt1049413',
            'tt0910970', 'tt0441773', 'tt1323594', 'tt0351283', 'tt0268380'
        ];

        foreach ($elements as $movie_code) {
            $imdb = new IMDB_API();
            $datasMovie = $imdb->getDatasFilmesCode($movie_code);
            Filmes::create([
                'imdb_code' => $movie_code,
                'titulo' => $datasMovie['titulo'],
                'tipo_capa' => 'imdb',
                'capa_url' => $datasMovie['imagem'],
                'nota_imdb' => $datasMovie['nota'],
                'descricao' => 'Filme Factory Descrição Teste',
            ]);
        }
    }
}
