<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSystem extends Model
{
    use HasFactory;
    protected $table = 'log_system';
    const UPDATED_AT=false;
    protected $filleble = [
        'message', 'level'
    ];
}
