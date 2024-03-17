<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Filmes;
use Illuminate\Http\Request;

class Listagens extends Controller
{
    public function filmes(Request $request)
    {
        $validate = $this->validate($request, [
            'order' => 'in:created_at,titulo,imdb_code,nota_imdb', 'order_by' => 'in:desc,asc',
            'page' => 'integer', 'per_page' => 'integer'
        ]);

        $filmes = Filmes::select('*')->orderBy($validate['order'] ?? 'id', $validate['order_by'] ?? 'ASC');

        if (isset($validate['per_page']) && $validate['per_page'] == 0) {
            // If send 0 returns all the films
            $validate['per_page'] = $filmes->count();
        }

        return response()->json($filmes->paginate($validate['per_page'] ?? 10, page: $validate['page'] ?? 1));
    }

    public function filmes_comentados(Request $request)
    {
        $validate = $this->validate($request, [
            'order_by' => 'in:desc,asc',
            'page' => 'integer', 'per_page' => 'integer'
        ]);

        $filmes_comentados = Filmes::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')
            ->withCount('comentarios')->orderBy('comentarios_count', $validate['order_by'] ?? 'DESC');

        return response()->json($filmes_comentados->paginate($validate['per_page'] ?? 10, page: $validate['page'] ?? 1));
    }

    public function filmes_categorias(Request $request)
    {
        $validate = $this->validate($request, [
            'id_categoria' => 'integer'
        ]);

        $filmes_categoria = Categorias::select('id', 'nome')->with(['filmes' => function ($relation) {
            return $relation->orderBy('created_at', 'DESC');
        }]);

        if (isset($validate['id_categoria'])) {
            $filmes_categoria->where('id', '=', $validate['id_categoria']);
        }

        return response()->json($filmes_categoria->orderBy('id', 'DESC')->get());
    }

    public function filmes_votados(Request $request)
    {
        $validate = $this->validate($request, [
            'order_by' => 'in:desc,asc', 'page' => 'integer', 'per_page' => 'integer'
        ]);

        $filmes_votados = Filmes::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')
            ->withCount('votos')
            ->orderBy('votos_count', $validate['order_by'] ?? 'DESC');

        return response()->json($filmes_votados->paginate($validate['per_page'] ?? 10, page: $validate['page'] ?? 1));
    }
}
