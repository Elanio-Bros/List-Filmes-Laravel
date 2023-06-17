<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\Filmes;
use App\Models\Usuarios;


class System extends Controller
{

    protected $logSystem;
    public function __construct()
    {
        parent::__construct();
        $this->logSystem = Log::channel('log_system');
    }

    public function index(Request $request)
    {
        $filmes_comentarios = Filmes::withCount('comentarios')->with(['comentarios' => function ($relation) {
            return $relation->where('grupos_comentario.titulo', '=', 'Comentário Gerais');
        }])->orderBy('comentarios_count', 'DESC')->take(10)->get();
        return view('welcome', [
            'filmes_comentarios' => $filmes_comentarios,
            'is_login' => $request->session()->has('usuario')
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => ['required', 'string'],
            'senha' => ['required', 'string'],
        ]);
        $usuario = Usuarios::where('usuario', $request->input('usuario'))
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
            'id' => $usuario['id'],
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
        $this->logSystem->info($request->session()->get('usuario')['usuario'] . ':Fez Logout');
        $request->session()->forget('usuario');
        return redirect()->route('entrada');
    }
}
