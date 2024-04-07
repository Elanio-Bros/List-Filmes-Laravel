<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;
use App\Models\Filmes;
use App\Models\Grupos_Comentarios;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;

class Filme extends Controller
{
    public function filme(int $id)
    {
        $filme = Filmes::with(['categorias' => function ($relation) {
            return $relation->orderBy('nome');
        }, 'grupos', 'grupos.comentarios', 'grupos.comentarios.usuario'])
            ->withCount('votos')->firstWhere('id', '=', $id);

        if ($filme != null) {
            $filme['usuario_voto'] = 0;

            if (Auth::check() == true) {
                $voto_usuario = Usuarios::with(['voto' => function ($relation) use ($filme) {
                    return $relation->firstWhere('id_filme', $filme['id']);
                }])->firstWhere('id', '=', Auth::user()->id)->votos;

                if (count($voto_usuario) !== 0) {
                    $filme['usuario_voto'] = $voto_usuario->first()->voto;
                }
            }

            $filme['nota_media'] = round($filme->votos->avg('voto'), 1);
            $filme['nota_imdb'] = round($filme['nota_imdb'], 1);
            return response()->json($filme, 200);
        } else {
            return response()->json(['erro' => 'filme', 'message' => 'filme not found'], 404);
        }
    }

    public function avaliacao_filme(Request $request, int $id)
    {
        $validate = $this->validate($request, [
            'voto' => ['required', 'integer'],
        ]);

        $usuario = Usuarios::firstWhere('id', '=', Auth::user()->id);

        $filme = Filmes::firstWhere('id', '=', $id);
        if ($filme !== null) {
            $voto_usuario = $usuario->votos()->firstWhere("id_filme", "=", $id);
            if ($voto_usuario == null) {
                $filme->votos()->create([
                    'voto' => $validate['voto'],
                    'id_usuario' => $usuario->id,
                ]);
            } else if ($voto_usuario->voto != $validate['voto']) {
                $voto_usuario->voto = $validate['voto'];
                $voto_usuario->save();
            }
            return response()->json(['message' => 'vote saved']);
        } else {
            return response()->json(['erro' => 'filme', 'message' => 'filme not found'], 404);
        }
    }

    public function grupo_filme(Request $request, int $id)
    {
        // Retonrar todos os grupos de um filme
    }

    public function criar_grupo_comentario(Request $request, int $id)
    {
        $validate = $this->validate($request, [
            'titulo_grupo' => ['required', 'string'],
        ]);

        $filme = Filmes::firstWhere('id', '=', $id);
        if ($filme !== null) {
            $grupo = $filme->grupos()->firstWhere(['titulo' => $validate['titulo_grupo']]);
            if ($grupo !== null) {
                return response()->json(['erro' => 'group', 'message' => "group about {$validate['titulo_grupo']} already exists"], 406);
            } else {

                $filme->grupos()->create(['titulo' => $validate['titulo_grupo'], 'id_usuario' => Auth::user()->id]);

                return response()->json(['message' => "group about {$validate['titulo_grupo']} created"], 203);
            }
        } else {
            return response()->json(['erro' => 'filme', 'message' => 'filme not found'], 404);
        }
    }


    public function comentario_grupo_filme(Request $request, int $id)
    {
        // Retonar comentarios de um grupo
    }

    public function comentar(Request $request, int $id, int $id_group)
    {
        $validate = $this->validate($request, [
            'comentario' => ['required', 'string'],
        ]);

        $filme = Filmes::where('id', '=', $id)->first();
        $grupo = Grupos_Comentarios::where([["id", '=', $id_group]])->first();

        if ($filme !== null && $grupo !== null) {

            $grupo->comentarios()->create([
                'comentario' => $validate['comentario'],
                'id_usuario' => Auth::user()->id,
            ]);

            $comentarios = Comentarios::where('id_grupo', $grupo->id)->with(['usuario'])->get()->toArray();

            return response()->json(['message' => 'comentario created', 'comentarios' => $comentarios], 203);
        } else if ($filme == null) {
            return response()->json(['erro' => 'filme', 'message' => 'filme not found'], 404);
        } else if ($grupo == null) {
            return response()->json(['erro' => 'group', 'message' => 'group not found'], 404);
        }
    }
}
