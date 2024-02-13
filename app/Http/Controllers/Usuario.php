<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Usuarios;
use App\Models\Filme_Votos;
use App\Models\Grupos_Comentarios;
use PDOException;

class Usuario extends Controller
{
    protected $logSystem;
    public function __construct()
    {
        parent::__construct();
        $this->logSystem = Log::channel('log_system');
    }

    public function criar_conta(Request $request)
    {
        $request->validate([
            'usuario' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'email' => ['required', 'string'],
            'senha' => ['required', 'string'],
        ]);
        $usuario = $request->except(['_token']);
        $usuario['senha'] = Hash::make($request->input('senha'));
        $usuario['token_api'] = Str::random(25);
        $usuario['tipo'] = 'Normal';
        try {
            Usuarios::create($usuario);
            $this->logSystem->info('Usuário: ' . $usuario['usuario'] . ' e Email: ' . $usuario['email'] . 'Cadastrado');
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $this->logSystem->error('Usuário:' . $usuario['usuario'] . ' ou Email:' . $usuario['email'] . ' Já Cadastrado');
                return Redirect::back()->withErrors(['usuario' => 'Usuário ou Email Já Cadastrado']);
            }
        }
        return (new System)->login($request);
    }

    public function user_conta()
    {
        return view('usuario.conta_usuario', [
            'usuario' => Usuarios::where('id', $this->id_usuario)->first(),
            'count_group' => Grupos_Comentarios::where('id_usuario', $this->id_usuario)->get()->count(),
            'count_votos' => Filme_Votos::where('id_usuario', $this->id_usuario)->get()->count(),

        ]);
    }

    public function update_user_conta(Request $request)
    {

        $update = $request->only(['usuario', 'nome', 'email']);

        if ($request->filled('senha')) {
            $update['senha'] = Hash::make($request->input('senha'));
        }
        if ($request->has('photo')) {
            $file = $request->file('photo');
            $file_name = hash('sha256', $file->getClientOriginalName()) . "." . $file->extension();
            $file->storeAs('', $file_name, 'user');
            $update['url_perfil'] = $file_name;
        }

        Usuarios::where('id', $this->id_usuario)->update($update);
        // return redirect()->route('minha_conta');
    }
}
