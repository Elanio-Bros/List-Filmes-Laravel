<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    // Log::channel('log_system')->info('Teste');
    return view('welcome');
})->name('entrada');

Route::get('/login', function () {
    return view('usuario.login');
})->name('login');

Route::get('/conta', function () {
    return view('usuario.conta');
})->name('conta');

Route::get('/home', function () {
    return view('filme.home');
})->name('home');

Route::get('/filme/nota', function () {
    return view('filme.nota');
})->name('nota');

Route::get('/filme/votados', function () {
    return view('filme.votados');
})->name('votados');

Route::get('filme/categorias', function () {
    return view('filme.categorias');
})->name('categorias');

Route::get('filme/categoria/{categoria}', function ($categoria) {
    return view('filme.categoria', compact("categoria"));
})->name('categoria');

Route::get('/filme/{idFilme}', function ($idFilme) {
    return view('filme.layout.filme', compact("idFilme"));
});

Route::get('/usuario/gerência', function (Request $request) {
    return view('usuario.gerenciar.gerencia',['request' => $request->all()]);
})->name('admin');

Route::get('/usuario/conta', function () {
    return view('usuario.conta_usuario');
})->name('minha_conta');
Route::get('/usuario/chat', function () {
    return view('usuario.chat');
})->name('chat');
Route::get('/usuario/favorito', function () {
    return view('usuario.favorito');
})->name('favorito');
Route::get('/usuario/gerência/filme', function () {
    return view('usuario.gerenciar.edit_filme');
});
Route::get('/usuario/gerência/filme/{idFilme}', function () {
    return view('usuario.gerenciar.edit_filme');
});
Route::get('/usuario/aviso', function () {
    return view('usuario.favorito');
})->name('aviso');
Route::get('/termo', function () {
    return view('termo');
});