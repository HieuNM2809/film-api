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
        'id',
        'content',
        'parent',
        'id_post',
        'id_user',
        'image'
    ];





    // function __construct(){
    //     parent::__construct();
    // }

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

    public function userComment()
    {
        return $this->belongsTo(User::class, 'id_user')->select("id", "name", "email", "avatar");
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent');
    }

    public function repliesShort()
    {
        return $this->hasMany(Comment::class, 'parent')->select($this->fillable)->with('userComment');
    }

    public function getListComment($condition = []){
        $sql = $this;
        if(isset($condition['id_post'])){
            $sql = $sql->where('id_post', $condition['id_post']);
        }
        if(isset($condition['id_user'])){
            $sql = $sql->where('id_user', $condition['id_user']);
        }
        return  $sql->select($this->fillable)->with("userComment")->with("repliesShort")->where('parent', null)->get();
    }
}


