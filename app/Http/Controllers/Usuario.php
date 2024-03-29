<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;
use App\Models\Filme_Votos;
use App\Models\Grupos_Comentarios;

class Usuario extends Controller
{

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
