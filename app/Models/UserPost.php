<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPost extends Base
{
    use HasFactory, SoftDeletes;
    protected $table ="user_post";
    protected $fillable = [
        'id_user',
        'id_post',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
    // kiểm tra bài viết đã được lưu hay chưa?
    public function checkSavedPosts($id_user, $id_post){
        return $this->where('id_user', $id_user)->where('id_post',$id_post)->first();
    }
    // delete post
    public function deleteUserPost($id_user, $id_post){
        return $this->where('id_user', $id_user)->where('id_post',$id_post)->delete();
    }
}
