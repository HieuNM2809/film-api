<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Base
{
    use HasFactory, SoftDeletes;
    protected $table = "comments";

    protected $fillable = [
        'content',
        'parent',
        'id_post',
        'id_user'
    ];



    function __construct(){
        parent::__construct();
    }

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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent');
    }

    public function getListComment(){
        return $this->with("replies")->with("user")->where('parent', null)->get();
    }
}
