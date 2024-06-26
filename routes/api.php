<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', [App\Http\Controllers\System::class, 'index'])->name('entrada');

Route::post('/login', [App\Http\Controllers\System::class, 'login']);

Route::post('/conta', [App\Http\Controllers\System::class, 'criar_conta']);

Route::get('/filmes', [App\Http\Controllers\Listagens::class, 'filmes']);
Route::get('/filmes/categorias', [App\Http\Controllers\Listagens::class, 'filmes_categorias']);
Route::get('/filmes/comentados', [App\Http\Controllers\Listagens::class, 'filmes_comentados']);
Route::get('/filmes/votados', [App\Http\Controllers\Listagens::class, 'filmes_votados']);
Route::get('/filme/{id}', [App\Http\Controllers\Filme::class, 'filme']);

Route::middleware(App\Http\Middleware\AuthUser::class)->group(function () {
    Route::post('/logout', [App\Http\Controllers\System::class, 'logout']);
    Route::post('/filme/{id}/voto/', [App\Http\Controllers\Filme::class, 'avaliacao_filme']);
    Route::get('/filme/{id}/grupos', [App\Http\Controllers\Filme::class, 'grupo_filme']);
    Route::post('/filme/{id}/grupo/', [App\Http\Controllers\Filme::class, 'criar_grupo_comentario']);
    Route::get('/filme/{id}/grupo/{id_group}/comentario', [App\Http\Controllers\Filme::class, 'comentario_grupo_filme']);
    Route::post('/filme/{id}/grupo/{id_group}/comentario', [App\Http\Controllers\Filme::class, 'comentar']);

    //usuário
    // Route::get('/usuario/conta', [App\Http\Controllers\Usuario::class, 'user_conta'])->name('minha_conta');
    // Route::post('/usuario/conta', [App\Http\Controllers\Usuario::class, 'update_user_conta'])->name('update_conta');

    // Route::get('/usuario/favoritos', function () {
    //     return view('usuario.favorito');
    // })->name('favorito');

    // Route::get('/usuario/chats', function () {
    //     return view('usuario.chat');
    // })->name('chat');
});



//gerência
Route::get('/gerência', [App\Http\Controllers\Gerencia::class, 'index'])->name('admin');
// Route::get('/gerência/filme', function () {
//     return view('usuario.gerenciar.edit_filme');
// });
// Route::get('/gerência/filme/{idFilme}', function () {
//     return view('usuario.gerenciar.edit_filme');
// });
