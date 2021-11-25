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
        'id_usuario',
    ];
    public function comentarios(){
        return $this->hasMany(Comentarios::class,'id_grupo','id');
    }
}
