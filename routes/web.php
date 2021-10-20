<?php

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

Route::get('/filme/notas', function () {
    return view('filme.nota');
})->name('notas');

Route::get('/filme/visitados', function () {
    return view('filme.visitados');
});

Route::get('filme/categoria/{categoria}', function ($categoria) {
    return view('filme.categoria', compact("categoria"));
})->name('categoria');

Route::get('/filme/{idFilme}', function ($idFilme) {
    return view('filme.layout.filme', compact("idFilme"));
});

Route::get('/usuario/gerência', function () {
    return view('usuario.gerencia');
});
Route::get('/usuario/conta', function () {
    return view('usuario.conta_usuario');
});
Route::get('/usuario/chat', function () {
    return view('usuario.chat');
});
Route::get('/usuario/favorito', function () {
    return view('usuario.favorito');
});

Route::get('/termo', function () {
    return view('termo');
});