<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Casts\PerfilUrl;

class User_Auth extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'usuario',
        'email',
        'url_perfil',
        'tipo_perfil',
    ];

    protected $hidden = [
        'senha'
    ];

    protected $casts = [
        'url_perfil' => PerfilUrl::class,
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        // Para caso vc utilize um valor diferente de password em seus modelos
        return $this->senha;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'usuario' => $this->usuario,
            'url_perfil' => $this->url_perfil,
        ];
    }
}
