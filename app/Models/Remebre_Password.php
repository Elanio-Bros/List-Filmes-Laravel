<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remebre_Password extends Model
{
    use HasFactory;
    protected $table='remebre_passwords';
    const UPDATED_AT=false;
    protected $fillable=['id_usuario','token','validate_at'];
    protected $hidden=['create_at'];
    
}
