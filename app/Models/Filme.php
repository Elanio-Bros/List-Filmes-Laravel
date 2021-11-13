<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupos_Comentarios;
use App\Models\Comentarios;


class Filme extends Model
{
    use HasFactory;
    protected $table = 'filmes';
    protected $fillable = [
        'imdb_code',
        'tipo_capa',
        'titulo',
        'descricao',
        'capa_url',
        'nota_imdb'
    ];

    public function grupos(){
        return $this->hasMany(Grupos_Comentarios::class,'id_filme','id');
    }
    public function comentarios(){
        return $this->hasManyThrough(Comentarios::class,Grupos_Comentarios::class,'id_filme','id_grupo','id','id');
    }
    public function categoria(){
        
    }
}
