<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Grupos_Comentarios;
use App\Models\Usuario;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class FilmeController extends Controller
{
    protected $logSystem;
    public function __construct()
    {
        $this->logSystem = Log::channel('log_system');
    }

    public function home()
    {
        $filmes_comentarios = Filme::select('titulo', 'imdb_code', 'capa_url', 'tipo_capa')->withCount('comentarios')->with(['comentarios' => function ($relation) {
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

    public function filme($code_url)
    {
        $filme = Filme::with(['categoriasFilmes' => function ($relation) {
            return $relation->orderBy('nome');
        }, 'grupos', 'grupos.comentarios', 'grupos.comentarios.usuario'])
            ->withCount('votos')->firstWhere('imdb_code', $code_url);
        if ($filme != null) {
            $voto_usuario = Usuario::with(['votos' => function ($relation) use ($filme) {
                return $relation->firstWhere('id_filme', $filme['id']);
            }])->firstWhere('usuario', session()->get('usuario')['usuario'])->votos;
            if (count($voto_usuario) != 0) {
                $filme['usuario_voto'] = $voto_usuario->first()->voto;
            }
            $filme['nota_media'] = round($filme->votos->avg('voto'), 1);
            $filme['nota_imdb'] = round($filme['nota_imdb'], 1);
            return view('filme.layout.filme', compact('filme'));
        }
        return redirect()->route('home');
    }

    public function avaliacaoFilme(Request $request, $code_url)
    {
        $request->validate([
            'voto' => ['required', 'integer'],
        ]);
        $usuario = Usuario::firstWhere('usuario', $request->session()->get('usuario')['usuario']);
        $filme = Filme::firstWhere('imdb_code', $code_url);
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
        return redirect()->back();
    }

    public function criarGrupoComentario(Request $request, $code_url)
    {
        $request->validate([
            'titulo_grupo' => ['required', 'string'],
        ]);
        $filme = Filme::firstWhere('imdb_code', $code_url);
        $usuario = Usuario::firstWhere('usuario', $request->session()->get('usuario')['usuario']);
        $grupo = $filme->grupos()->firstOrNew(['titulo' => 'Sobre ' . $request->input('titulo_grupo')]);
        if ($grupo->exists) {
            return Redirect::back()->withErrors(['grupo' => 'Grupo Sobre ' . $request->input('titulo_grupo') . ' Já Existe']);
        } else {
            $grupo['id_usuario'] = $usuario->id;
            $grupo->save();
        }
        return redirect()->back();
    }
    public function comentarioGrupoFilme(Request $request, $code_url)
    {
        // $request->validate([
        //     'comentario' => ['required', 'string'],
        //     'id_grupo' => ['required', 'integer'],
        // ]);
        // $grupo = Grupos_Comentarios::with('comentarios')->where('');
        // $cometarios = $grupo->get()->toArray();
        return response()->json(['code' => $code_url, 'grupo' => $request->input('id_grupo')], 200);
    }
}
