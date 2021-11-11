<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;
    protected $table = 'comentarios_grupo_filme';
    protected $fillable = [
        'id_usuario',
        'id_grupo',
        'comentario',
    ];
}