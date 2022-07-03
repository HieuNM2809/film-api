<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Base;

class Setting extends Base
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'key',
        'value',
        'id_user',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
