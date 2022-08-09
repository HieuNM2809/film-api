<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserIconRank extends Base
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_user',
        'id_icon',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_comment');
    }
    public function iconRank()
    {
        return $this->belongsTo(IconRank::class, 'id_icon');
    }
}
