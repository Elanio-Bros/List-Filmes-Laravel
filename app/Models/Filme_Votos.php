<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme_Votos extends Model
{
    use HasFactory;
    protected $table = 'filme_votos';
    protected $fillable = [
        'voto',
        'id_usuario',
        'id_filme',
    ];

    public function usuario()
    {
        return $this->hasMany(Usuarios::class,'id','id_usuario');
    }

    public function filme()
    {
        return $this->hasMany(Filmes::class,'id','id_filme');
    }
}
