<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\LogSystem;
use App\Models\Usuario;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDOException;

class UsuarioController extends Controller
{
    protected $logSystem;
    public function __construct()
    {
        $this->logSystem = Log::channel('log_system');
    }

    public function welcome()
    {
        $filmes_comentarios = Filme::withCount('comentarios')->with(['comentarios' => function ($relation) {
            return $relation->where('grupos_comentario.titulo', '=', 'Comentário Gerais');
        }], 'comentarios.usuario')->orderBy('comentarios_count', 'DESC')->take(10)->get();
        return view('welcome', ['filmes_comentarios' => $filmes_comentarios]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => ['required', 'string'],
            'senha' => ['required', 'string'],
        ]);
        $usuario = Usuario::where('usuario', '=', $request->input('usuario'))
            ->orWhere('email', '=', $request->input('usuario'))->first();
        if ($usuario != null) {
            $senhaUsuario = $usuario['senha'];
            if (!Hash::check($request->input('senha'), $senhaUsuario)) {
                $this->logSystem->error($request->input('usuario') . ':Senha Incorreta');
                return Redirect::back()->withErrors(['senha' => 'Senha Invalida']);
            }
        } else {
            $this->logSystem->error($request->input('usuario') . ':Usuário Não Existe');
            return Redirect::back()->withErrors(['usuario' => 'Usuário/Email Invalido']);
        }
        $usuario = [
            'usuario' => $usuario['usuario'],
            'tipo' => $usuario['tipo'],
            'perfil' => $usuario['url_perfil'],
            'api_token' => $usuario['token_api'],
        ];
        $request->session()->put('usuario', $usuario);
        $this->logSystem->info($request->input('usuario') . ': Fez Login');
        return redirect('home');
    }

    public function logout(Request $request)
    {
        $this->logSystem->info($request->input('usuario') . ': Fez Logout');
        $request->session()->forget('usuario');
        return redirect()->route('entrada');
    }

    public function criarConta(Request $request)
    {
        $request->validate([
            'usuario' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'email' => ['required', 'string'],
            'senha' => ['required', 'string'],
        ]);
        $usuario = $request->except(['_token']);
        $usuario['senha'] = Hash::make($request->input('senha'));
        $usuario['token_api'] = Str::random(25);
        $usuario['tipo'] = 'Normal';
        try {
            Usuario::create($usuario);
            $this->logSystem->info('Usuário: ' . $usuario['usuario'] . ' e Email: ' . $usuario['email'] . ' Cadastrado');
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $this->logSystem->error('Usuário: ' . $usuario['usuario'] . ' ou Email: ' . $usuario['email'] . ' Já Cadastrado');
                return Redirect::back()->withErrors(['usuario' => 'Usuário ou Email Já Cadastrado']);
            }
        }
        return $this->login($request);
    }

    public function home()
    {
        $filmes_comentarios = Filme::select('titulo', 'imdb_code', 'capa_url')->withCount('comentarios')->with(['comentarios' => function ($relation) {
            return $relation->where('grupos_comentario.titulo', '=', 'Comentário Gerais');
        }])->orderBy('comentarios_count', 'DESC')->take(10)->get();

        $ult_filmes = Filme::select('titulo', 'imdb_code', 'capa_url')->orderBy('created_at', 'DESC')->take(15)->get();

        $filmes_categoria = Categoria::with(['filmes' => function ($relation) {
            return $relation->orderBy('created_at', 'DESC');
        }])->orderBy('created_at', 'DESC')->take(5)->get();
        return view('filme.home', [
            'ult_filmes' => $ult_filmes,
            'filmes_mais_comentados' => $filmes_comentarios,
            'categorias_utimo_filmes' => $filmes_categoria,
        ]);
    }
}
