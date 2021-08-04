<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_Filme extends Model
{
    use HasFactory;
    protected $table = "categoria_filmes";
    public $timestamps = false;

    protected $fillable = [
        'filme',
        'categoria',
    ];
}
