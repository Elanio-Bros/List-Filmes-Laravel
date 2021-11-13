<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Comentarios extends Model
{
    use HasFactory;
    protected $table = 'comentarios_grupo_filme';
    protected $fillable = [
        'id_usuario',
        'id_grupo',
        'comentario',
    ];

    public function usuario(){
        return $this->hasMany(Usuario::class,'id','id_usuario');
    }
}
