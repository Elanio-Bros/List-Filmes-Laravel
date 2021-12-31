<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Casts\PerfilUrl;
// use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $fillable = [
        'nome',
        'usuario',
        'email',
        'token_api',
        'url_perfil',
        'tipo',
        'tipo_perfil',
        'senha',
    ];
    protected $hidden = [
        'senha'
    ];
    protected $casts = [
        'url_perfil' => PerfilUrl::class,
    ];

    public function votos(){
        return $this->hasMany(Filme_Votos::class,'id_usuario','id');
    }
}
