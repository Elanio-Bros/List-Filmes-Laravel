<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria_Filme;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $fillable = ['nome'];

    public function categoriaFilme(){
        return $this->hasMany(Categoria_Filme::class,'id_categoria','id');
    }
    public function filmes(){
        return $this->hasManyThrough(Filme::class,Categoria_Filme::class,'id_categoria','id','id','id_filme');
    }
}
