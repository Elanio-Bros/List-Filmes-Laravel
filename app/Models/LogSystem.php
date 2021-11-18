<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSystem extends Model
{
    use HasFactory;
    protected $table = 'log_system';
    const UPDATED_AT = null;
    const CREATED_AT = 'created_at';
    protected $fillable = ['level', 'message','created_at'];
    protected $hidden=['create_at'];
}
