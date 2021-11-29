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
        return $this->hasMany(Usuario::class,'id','id_usuario');
    }

    public function filme()
    {
        return $this->hasMany(Filme::class,'id','id_filme');
    }
}
