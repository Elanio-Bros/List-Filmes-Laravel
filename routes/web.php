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
    return view('usuario.entrada.login');
})->name('login');
Route::get('/conta', function () {
    return view('usuario.entrada.conta');
})->name('conta');
