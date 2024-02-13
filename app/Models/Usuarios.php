<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Casts\PerfilUrl;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $fillable = [
        'nome',
        'usuario',
        'email',
        'url_perfil',
        'tipo',
        'tipo_perfil',
    ];

    protected $hidden = [
        'senha'
    ];


    protected $casts = [
        'url_perfil' => PerfilUrl::class,
    ];

    public function votos()
    {
        return $this->hasMany(Filme_Votos::class, 'id_usuario', 'id');
    }
}
