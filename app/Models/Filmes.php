<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\CapaFilmeUrl;

class Filmes extends Model
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

    protected $casts = [
        'capa_url' => CapaFilmeUrl::class,
    ];

    public function grupos()
    {
        return $this->hasMany(Grupos_Comentarios::class, 'id_filme', 'id');
    }
    
    public function comentarios()
    {
        return $this->hasManyThrough(Comentarios::class, Grupos_Comentarios::class, 'id_filme', 'id_grupo', 'id', 'id');
    }

    public function categoriasFilmes()
    {
        return $this->hasManyThrough(Categorias::class, Categoria_Filme::class, 'id_filme', 'id', 'id', 'id_categoria');
    }

    public function votos()
    {
        return $this->hasMany(Filme_Votos::class, 'id_filme', 'id');
    }
}
