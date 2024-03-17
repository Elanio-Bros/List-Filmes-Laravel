<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comentarios;
use Illuminate\Http\Request;
use App\Models\Filmes;
use App\Models\Grupos_Comentarios;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
                }])->firstWhere('id',)->votos;

                if (count($voto_usuario) !== 0) {
                    $filme['usuario_voto'] = $voto_usuario->first()->voto;
                }
            }
            $filme['nota_media'] = round($filme->votos->avg('voto'), 1);
            $filme['nota_imdb'] = round($filme['nota_imdb'], 1);
            return response()->json($filme);
        }

        return response()->json(['erro' => 'filme', 'message' => 'filme not found'], 404);
    }

    public function avaliacao_filme(Request $request, $code_url)
    {
        $this->validate($request, [
            'voto' => ['required', 'integer'],
        ]);
        $usuario = Usuarios::firstWhere('usuario', $this->usuario['usuario']);
        $filme = Filmes::firstWhere('imdb_code', $code_url);
        $voto_usuario = $usuario->votos()->firstWhere("id_filme", $filme->id);
        if ($voto_usuario == null) {
            $filme->votos()->create([
                'voto' => $request->input('voto'),
                'id_usuario' => $usuario->id,
            ]);
        } else if ($voto_usuario->voto != $request->input('voto')) {
            $voto_usuario->voto = $request->input('voto');
            $voto_usuario->save();
        }
        // return redirect()->back();
    }

    public function criar_grupo_comentario(Request $request, $code_url)
    {
        $this->validate($request, [
            'titulo_grupo' => ['required', 'string'],
        ]);
        $filme = Filmes::firstWhere('imdb_code', $code_url);
        $usuario = Usuarios::firstWhere('usuario', $this->usuario['usuario']);
        $grupo = $filme->grupos()->firstOrNew(['titulo' => 'Sobre ' . $request->input('titulo_grupo')]);
        if ($grupo->exists) {
            return Redirect::back()->withErrors(['grupo' => 'Grupo Sobre ' . $request->input('titulo_grupo') . ' Já Existe']);
        } else {
            $grupo['id_usuario'] = $usuario->id;
            $grupo->save();
        }
        // return redirect()->back();
    }

    public function comentario_grupo_filme(Request $request, $code_url)
    {
        $this->validate($request, [
            'titulo_grupo' => ['required', 'string'],
            'comentario' => ['required', 'string'],
            'id_grupo' => ['required', 'string'],
        ]);
        if (preg_match("/(\d+)/", $request->input('id_grupo'), $matches)) {
            $id_grupo = current($matches);
            $titulo = $request->input('titulo_grupo');
            $grupo = Grupos_Comentarios::where('id_filme', Filmes::where('imdb_code', $code_url)->first()->id)
                ->where('id', $id_grupo)->where('titulo', $titulo)->first();
            $grupo->comentarios()->create([
                'comentario' => $request->input('comentario'),
                'id_usuario' => $this->id_usuario,
            ]);
            $comentarios = Comentarios::select('comentario', 'id_usuario')->where('id_grupo', $grupo->id)->with(['usuario' => function ($relation) {
                $relation->select('id', 'usuario', 'url_perfil', 'tipo_perfil');
            }])->get()->toArray();
            return response()->json($comentarios, 200);
        } else {
            abort(404);
        }
    }
}
