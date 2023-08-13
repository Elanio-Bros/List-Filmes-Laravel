<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthUser;
use App\Http\Controllers\Usuario;
use App\Http\Controllers\Filme;
use App\Http\Controllers\Gerencia;
use App\Http\Controllers\Listagens;
use App\Http\Controllers\System;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [System::class, 'index'])->name('entrada');

Route::get('/termo', function () {
    return view('termo');
});

Route::get('/login', function (Request $request) {
    if (!$request->session()->has('usuario')) {
        return view('usuario.entrada.login',[]);
    } else {
        return redirect()->route('home');
    }
})->name('login');

Route::post('/login', [System::class, 'login']);

Route::get('/conta', function () {
    return view('usuario.entrada.conta');
})->name('conta');

Route::post('/conta', [System::class, 'criar_conta']);



Route::middleware(AuthUser::class)->group(function () {
    Route::get('/logout', [System::class, 'logout'])->name('logout');

    Route::get('/home', [Listagens::class, 'home'])->name('home');

    Route::get('/filme/nota', function () {
        return view('filme.nota');
    })->name('nota');

    Route::get('/filme/votados', [Listagens::class, 'votados'])->name('votados');

    Route::get('filme/categorias', function () {
        return view('filme.categorias');
    })->name('categorias');

    Route::get('filme/categoria/{categoria}', function ($categoria) {
        return view('filme.categoria', compact("categoria"));
    })->name('categoria');

    Route::get('/filme/{code_url}', [Filme::class, 'filme']);
    Route::post('/filme/{code_url}/voto/', [Filme::class, 'avaliacao_filme'])->name('voto');
    Route::post('/filme/{code_url}/grupo/', [Filme::class, 'criar_grupo_comentario'])->name('criarGrupo');
    Route::post('/filme/{code_url}/grupo/comentario', [Filme::class, 'comentario_grupo_filme'])->name('comentario');

    //usuário
    Route::get('/usuario/conta', [Usuario::class, 'user_conta'])->name('minha_conta');
    Route::post('/usuario/conta', [Usuario::class, 'update_user_conta'])->name('update_conta');

    // Route::get('/usuario/favoritos', function () {
    //     return view('usuario.favorito');
    // })->name('favorito');

    // Route::get('/usuario/chats', function () {
    //     return view('usuario.chat');
    // })->name('chat');
});



//gerência
Route::get('/gerência',[Gerencia::class,'index'])->name('admin');
// Route::get('/gerência/filme', function () {
//     return view('usuario.gerenciar.edit_filme');
// });
// Route::get('/gerência/filme/{idFilme}', function () {
//     return view('usuario.gerenciar.edit_filme');
// });
