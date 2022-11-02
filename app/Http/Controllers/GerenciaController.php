<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GerenciaController extends Controller
{
    public function __construct()
    {
        $this->logSystem = Log::channel('log_system');
    }

    public function user_conta(Request $request)
    {
        $id_user = $request->session()->get('usuario')['id'];
        $user = Usuario::where('id', $id_user)->first();
        return view('usuario.conta_usuario',$user);
    }
}
