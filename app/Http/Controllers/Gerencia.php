<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Filmes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Gerencia extends Controller
{
    protected $logSystem;
    public function __construct()
    {
        parent::__construct();
        $this->logSystem = Log::channel('log_system');
    }

    function index(Request $request)
    {
        $categories = Categorias::all();
        $filmes_ult = Filmes::whereRaw(DB::raw('YEAR(created_at)=' . date('Y')))->whereRaw(DB::raw('MONTH(created_at)=' . date('m')))->get();
        return view('usuario.gerenciar.gerencia', compact("categories", "filmes_ult"));
    }
}
