<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ="comments";

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
    public function getCommentById($idPost, $from, $to){
       return $this->where('id_post' , $idPost)->offset($from)->limit($to)->get();
    }
}
