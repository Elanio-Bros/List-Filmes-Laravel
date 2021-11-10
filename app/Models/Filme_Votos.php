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
}
