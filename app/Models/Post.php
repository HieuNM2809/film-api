<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'id_title_type',
        'id_user',
    ];
    public function titleType()
    {
        return $this->belongsTo(TitleType::class, 'id_title_type');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_post', 'id');
    }

    public function userFeel()
    {
        return $this->hasMany(UserFeel::class, 'id_post', 'id');
    }
}
