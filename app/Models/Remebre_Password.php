<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remebre_Password extends Model
{
    use HasFactory;
    protected $table = 'remebre_passwords';
    const UPDATED_AT = null;
    const CREATE_AT = 'create_at';
    protected $fillable = ['id', 'id_usuario', 'token', 'validate_at', 'create_at'];
    protected $hidden = ['create_at'];
}
