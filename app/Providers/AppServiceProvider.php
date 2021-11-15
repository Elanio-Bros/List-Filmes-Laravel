<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Filme;
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
            $cateogiras = Categoria::withCount('filmes')->orderBy('filmes_count', 'DESC')->take(5)->get();
            $view->with('categoria_nav', $cateogiras);
        });
        view()->composer(['usuario.layout.layout'], function ($view) {
            $capa_filmes = Filme::select('capa_url', 'tipo_capa')->get()->toArray();
            if (count($capa_filmes) >= 8) {
                $view->with('capa_filmes', $capa_filmes);
            }
        });
    }
}
