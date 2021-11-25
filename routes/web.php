<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;

use App\Http\Middleware\AuthUser;
use GuzzleHttp\Middleware;

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

Route::get('/', [UsuarioController::class, 'welcome'])->name('entrada');

Route::get('/termo', function () {
    return view('termo');
});

Route::get('/login', function (Request $request) {
    if (!$request->session()->has('usuario')) {
        return view('usuario.entrada.login');
    } else {
        return redirect()->route('home');
    }
})->name('login');

Route::post('/login', [UsuarioController::class, 'login']);

Route::get('/conta', function () {
    return view('usuario.entrada.conta');
})->name('conta');

Route::post('/conta', [UsuarioController::class, 'criarConta']);



Route::middleware(AuthUser::class)->group(function () {
    Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

    Route::get('/home', [UsuarioController::class, 'home'])->name('home');

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

    Route::get('/filme/{code_url}', [UsuarioController::class, 'filme']);
    Route::post('/filme/{code_url}/voto', [UsuarioController::class, 'avaliacaoFilme'])->name('voto');

    //usuário
    Route::get('/usuario/conta', function () {
        return view('usuario.conta_usuario');
    })->name('minha_conta');

    Route::get('/usuario/favorito', function () {
        return view('usuario.favorito');
    })->name('favorito');
    // Route::get('/usuario/chat', function () {
    //     return view('usuario.chat');
    // })->name('chat');
});

//gerência
Route::get('/gerência', function (Request $request) {
    return view('usuario.gerenciar.gerencia', ['request' => $request->all()]);
})->name('admin');
// Route::get('/gerência/filme', function () {
//     return view('usuario.gerenciar.edit_filme');
// });
// Route::get('/gerência/filme/{idFilme}', function () {
//     return view('usuario.gerenciar.edit_filme');
// });
