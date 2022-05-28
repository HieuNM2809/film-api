<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'content',
        'parent',
        'id_post'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
    public function userFeel()
    {
        return $this->hasMany(UserFeel::class, 'id_comment', 'id');
    }
}
