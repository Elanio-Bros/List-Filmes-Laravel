<?php

namespace App\Http\Controllers;

use App\Class\IMDB_API;
use App\Models\Categoria_Filme;
use App\Models\Categorias;
use App\Models\Filmes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Gerencia extends Controller
{
    protected $logSystem;
    public function __construct()
    {
        parent::__construct();
        $this->logSystem = Log::channel('log_system');
    }

    public function index(Request $request)
    {
        $categories = Categorias::all();
        $filmes_ult = Filmes::whereRaw(DB::raw('YEAR(created_at)=' . date('Y')))->whereRaw(DB::raw('MONTH(created_at)=' . date('m')))->get();
        return view('usuario.gerenciar.gerencia', compact("categories", "filmes_ult"));
    }

    public function get_filmes(Request $request)
    {
        // // $categories = Categorias::all();
        // // $filmes_ult = Filmes::whereRaw(DB::raw('YEAR(created_at)=' . date('Y')))->whereRaw(DB::raw('MONTH(created_at)=' . date('m')))->get();
        // return view('usuario.gerenciar.gerencia', compact("categories", "filmes_ult"));
    }

    public function adicionar_filmes(Request $request)
    {
        $validate = $request->validate([
            'titulo' => ['string'],
            'imdb_code' => ['required', 'string'],
            'descricao' => ['string'],
            'id_categorie' => ['required', 'integer'],
            'tipo_capa' => ['required', 'in:imdb,file'],
            'imagem' => 'imagem',
        ]);
        $movie_code = $validate['imdb_code'];
        $imdb = new IMDB_API();
        $datasMovie = $imdb->getDatasFilmesCode($movie_code);
        if (!isset($datasMovie['erro'])) {
            if (isset($validate['imagem'])) {
                $file = $request->file('imagem');
                $path = "$movie_code" . $file->extension();
                Storage::drive('case')->putFile($path, $file);
                $validate['imagem'] = $path;
            }

            $create_filme = [
                'imdb_code' => $movie_code,
                'titulo' => $validate['titulo'] ?? $datasMovie['titulo'],
                'tipo_capa' => $validate['tipo_capa'],
                'capa_url' => $validate['tipo_capa'] == 'file' ? $validate['imagem'] : $datasMovie['imagem'],
                'nota_imdb' => $datasMovie['nota'],
                'descricao' => $validate['descricao'] ?? '',
            ];

            $filme_id = Filmes::insertGetId($create_filme);
            Categoria_Filme::create(['id_filme' => $filme_id, 'id_categoria' => $validate['id_categorie']]);
            return 'Filme Create';
        } else {
            return $datasMovie['erro'];
        }
    }

    public function atualizar_filmes(Request $request)
    {
        $validate = $request->validate([
            'id' => ['required', 'integer'],
            'titulo' => ['string'],
            'imdb_code' => ['required', 'string'],
            'descricao' => ['string'],
            'id_categorie' => ['required', 'integer'],
            'tipo_capa' => ['required', 'in:imdb,file'],
            'imagem' => 'imagem',
        ]);
        $id_filme = $validate['id'];
        $movie_code = $validate['imdb_code'];
        $imdb = new IMDB_API();
        $datasMovie = $imdb->getDatasFilmesCode($movie_code);

        if (!isset($datasMovie['erro'])) {

            if (isset($validate['imagem'])) {
                $file = $request->file('imagem');
                $path = "$movie_code" . $file->extension();
                Storage::drive('case')->putFile($path, $file);
                $validate['imagem'] = $path;
            }

            $update_filme = [
                'imdb_code' => $movie_code,
                'titulo' => $validate['titulo'] ?? $datasMovie['titulo'],
                'tipo_capa' => $validate['tipo_capa'],
                'capa_url' => $validate['tipo_capa'] == 'file' ? $validate['imagem'] : $datasMovie['imagem'],
                'nota_imdb' => $datasMovie['nota'],
                'descricao' => $validate['descricao'] ?? '',
            ];

            Filmes::where('id', '=', $id_filme)->update($update_filme);
            Categoria_Filme::where('id', '=', $id_filme)->update(['id_categoria' => $validate['id_categorie']]);
            return 'Filme Update';
        } else {
            return $datasMovie['erro'];
        }
    }

    public function adicionar_categoria(Request $request)
    {
        $validate = $request->validate([
            'nome' => ['required', 'string'],
        ]);

        if (Categorias::where('nome', 'LIKE', "%" . $validate['nome'] . "%")->count() == 0) {
            Categorias::create(['nome' => $validate['nome']]);
            return 'Categoria Create';
        } else {
            return "Já a uma categoria com esse nome";
        }
    }


    public function atualizar_categoria(Request $request)
    {
        $validate = $request->validate([
            'id' => ['required', 'integer'],
            'nome' => ['required', 'string'],
        ]);

        if (Categorias::where('nome', 'LIKE', "%" . $validate['nome'] . "%")->count() == 0) {
            Categorias::where('id', '=', $validate['id'])->update(['nome' => $validate['nome']]);
            return 'Categoria Update';
        } else {
            return "Já a uma categoria com esse nome";
        }
    }
}
