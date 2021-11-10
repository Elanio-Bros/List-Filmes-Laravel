<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UsuarioController extends Controller
{
    public function welcome(){
        $filmes_comentarios=[
            [
                'titulo'=>'teste1',
                'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg',
                'comentarios'=>[
                    ['nome_usuario'=>'Pessoa1','comentario'=>'Teste Comentario'],
                    ['nome_usuario'=>'Pessoa2','comentario'=>'Teste Comentario'],
                    ['nome_usuario'=>'Pessoa3','comentario'=>'Teste Comentario']
                ]
            ]
            ,[
                'titulo'=>'teste2',
                'imagem'=>'https://i.pinimg.com/474x/71/58/62/715862abd521e6b3ccc1b70470b02913.jpg',
                'comentarios'=>[
                    ['nome_usuario'=>'Pessoa1','comentario'=>'Teste Comentario'],
                    ['nome_usuario'=>'Pessoa2','comentario'=>'Teste Comentario'],
                    ['nome_usuario'=>'Pessoa3','comentario'=>'Teste Comentario'],
                    ['nome_usuario'=>'Pessoa4','comentario'=>'Teste Comentario'],
                ]
            ]
        ];
        return view('welcome',['filmes_comentarios'=>$filmes_comentarios]);
    }
    public function Login(Request $request){
        
    }
    public function CriarConta(Request $request){
        
    }
}
