<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_Filme extends Model
{
    use HasFactory;
    protected $table = 'categorias_filmes';
    protected $fillable = [
        'id_categoria', 'id_filme'
    ];
}
