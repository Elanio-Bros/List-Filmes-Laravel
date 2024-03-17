<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;
    protected $table = 'comentarios_grupo_filme';
    protected $fillable = [
        'id_grupo',
        'comentario',
    ];

    protected $hidden = [
        'id_usuario',
        "created_at",
        "updated_at",
    ];


    public function usuario()
    {
        return $this->hasMany(Usuarios::class, 'id', 'id_usuario')->select('id', 'usuario', 'url_perfil','tipo_perfil');
    }
}
