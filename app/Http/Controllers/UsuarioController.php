<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
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
            'senha' => 'required|string',
            'usuario' => 'required|string',
        ],[
            'usuario.required' => 'Faltando campo usuário ou email',
            'senha.required' => 'Faltando campo senha',
        ]);
        return route('login');
    }
    public function criarConta(Request $request)
    {
        return view('usuario.entrada.conta');
    }
    public function home(Request $request)
    {
        return view('filme.home');
    }
}
