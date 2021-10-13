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
Route::get('/filme/{idFilme}', function ($idFilme) {
    return view('filme.filme', compact("idFilme"));
});
Route::get('/categoria/{categoria}', function ($categoria) {
    return view('filme.categoria', compact("categoria"));
})->name('categoria');
Route::get('/termo', function () {
    return view('termo');
});
