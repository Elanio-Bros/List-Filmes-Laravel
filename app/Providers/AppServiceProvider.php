<?php

namespace App\Providers;

use App\Models\Categorias;
use App\Models\Filmes;
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
            $categoria_nav = Categorias::withCount('filmes')->orderBy('filmes_count', 'DESC')->take(5)->get();
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
            $capa_filmes = Filmes::select('capa_url', 'tipo_capa')->get()->toArray();
            if (count($capa_filmes) >= 8) {
                $view->with(compact('capa_filmes'));
            }
        });
    }
}
