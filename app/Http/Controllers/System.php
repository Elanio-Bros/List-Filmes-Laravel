<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class System extends Controller
{

    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
            'usuario' => ['required', 'string'],
            'senha' => ['required', 'string'],
        ]);

        if (!$token = Auth::attempt(['usuario' => $credentials['usuario'], 'password' => $credentials['senha']])) {
            $this->logSystem->error($request->input('usuario') . ':Usuário ou senha invalidos');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $this->logSystem->info($request->input('usuario') . ': Fez Login');
        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        $this->logSystem->info($request->session()->get('usuario')['usuario'] . ':Fez Logout');
        Auth::logout();
        return response()->json(['message' => 'User Logout']);
    }
}
