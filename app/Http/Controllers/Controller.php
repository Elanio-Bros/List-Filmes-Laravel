<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $usuario;
    protected int $id_usuario;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($request->session()->has('usuario')) {
                $this->usuario = $request->session()->get('usuario');
                $this->id_usuario = $request->session()->get('usuario')['id'];
            }
            return $next($request);
        });
    }
}
