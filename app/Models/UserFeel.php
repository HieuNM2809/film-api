<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_feel',
        'status',
        'id_react',
    ];
}
