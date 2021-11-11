<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;
    protected $table = 'filmes';
    protected $fillable = [
        'imdb_code',
        'titulo',
        'descricao',
        'capa_url',
        'nota_imdb'
    ];
}
