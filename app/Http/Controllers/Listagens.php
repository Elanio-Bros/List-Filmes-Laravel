<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Filmes;
use Illuminate\Http\Request;

class Listagens extends Controller
{
    public function filmes()
    {
        $ult_filmes = Filmes::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')->orderBy('created_at', 'DESC')->take(15)->get();
        return response()->json(Filmes::all());
    }

    public function filmes_comentarios()
    {
        $filmes_comentarios = Filmes::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')
            ->withCount('comentarios')
            ->with(['comentarios' => function ($relation) {
                return $relation->where('grupos_comentario.titulo', '=', 'Comentário Gerais');
            }])->orderBy('comentarios_count', 'DESC')->take(10)->get();
    }

    public function filmes_categorias()
    {
        $filmes_categoria = Categorias::with(['filmes' => function ($relation) {
            return $relation->orderBy('created_at', 'DESC');
        }])->orderBy('created_at', 'DESC')->take(5)->get();
    }

    public function votados(Request $request)
    {
        $filmes = Filmes::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')
            ->withCount('votos')
            ->orderBy('votos_count', 'DESC')
            ->paginate(20, page: $request->input('page', 1));
    }
}
