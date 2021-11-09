<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSystem extends Model
{
    use HasFactory;
    protected $table = 'log_system';
    public $updated_at=false;
    protected $filleble = [
        'message', 'level'
    ];
}
