<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos_Comentarios extends Model
{
    use HasFactory;
    protected $table = 'grupos_comentario';

    protected $fillable = [
        'titulo',
        'id_filme',

        // hidden
        'id_usuario',
    ];

    protected $hidden = [
        "id",
        'id_usuario',
        "created_at",
        "updated_at",
    ];


    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_grupo', 'id');
    }
    public function filme()
    {
        return  $this->hasMany(Filmes::class, 'id', 'id_filme');
    }
}
