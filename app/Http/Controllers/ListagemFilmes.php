<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListagemFilmes extends Controller
{
    protected $logSystem;
    public function __construct()
    {
        parent::__construct();
        $this->logSystem = Log::channel('log_system');
    }

    public function home()
    {
        $filmes_comentarios = Filme::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')
            ->withCount('comentarios')
            ->with(['comentarios' => function ($relation) {
                return $relation->where('grupos_comentario.titulo', '=', 'Comentário Gerais');
            }])->orderBy('comentarios_count', 'DESC')->take(10)->get();

        $ult_filmes = Filme::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')->orderBy('created_at', 'DESC')->take(15)->get();

        $filmes_categoria = Categoria::with(['filmes' => function ($relation) {
            return $relation->orderBy('created_at', 'DESC');
        }])->orderBy('created_at', 'DESC')->take(5)->get();

        return view('filme.home', [
            'ult_filmes' => $ult_filmes,
            'filmes_mais_comentados' => $filmes_comentarios,
            'categorias_utimo_filmes' => $filmes_categoria,
        ]);
    }

    public function votados(Request $request)
    {
        $filmes = Filme::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')
            ->withCount('votos')
            ->orderBy('votos_count', 'DESC')
            ->paginate(20, page: $request->input('page', 1));
        return view('filme.votados', ['filmes' => $filmes]);
    }
}
