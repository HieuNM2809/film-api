<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donate extends Base
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'link',
        'id_user',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
