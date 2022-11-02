<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['content.nav'], function ($view) {
            $categoria_nav = Categoria::withCount('filmes')->orderBy('filmes_count', 'DESC')->take(5)->get();
            $view->with(compact('categoria_nav'));
        });

        view()->composer(['usuario.layout.nav_user'], function ($view) {
            $usuario = request()->session()->get('usuario');
            if (request()->session()->has('usuario')) {
                $url_perfil = URL::asset($usuario['perfil']);
                $is_admin = strtolower($usuario['tipo']) == 'admin';
                $view->with(compact('url_perfil', 'is_admin'));
            }
        });

        view()->composer(['usuario.layout.fundo_layout'], function ($view) {
            $capa_filmes = Filme::select('capa_url', 'tipo_capa')->get();
            if (count($capa_filmes) >= 8) {
                $view->with(compact('capa_filmes'));
            }
        });
    }
}
