<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFeel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_user',
        'id_post',
        'id_comment',
        'id_react',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'id_comment');
    }
    public function react()
    {
        return $this->belongsTo(React::class, 'id_react');
    }
}
