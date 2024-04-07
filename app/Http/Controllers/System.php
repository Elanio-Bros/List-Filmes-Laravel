<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PDOException;

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
        $this->logSystem->info(Auth::user()['usuario'] . ':Fez Logout');
        Auth::logout();
        return response()->json(['message' => 'User Logout']);
    }

    public function criar_conta(Request $request)
    {
        $validate = $this->validate($request, [
            'usuario' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'email' => ['required', 'string'],
            'senha' => ['required', 'string'],
        ]);

        $validate['senha'] = Hash::make($validate['senha']);
        $validate['tipo'] = 2;

        try {
            Usuarios::create($validate);
            $this->logSystem->info('Usuário: ' . $validate['usuario'] . ' e Email: ' . $validate['email'] . 'Cadastrado');
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $this->logSystem->error('Usuário:' . $validate['usuario'] . ' ou Email:' . $validate['email'] . ' Já Cadastrado');
                return Redirect::back()->withErrors(['usuario' => 'Usuário ou Email Já Cadastrado']);
            }
        }
        return (new System)->login($request);
    }
}
