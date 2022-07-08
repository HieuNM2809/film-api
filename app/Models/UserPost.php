<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
    public function infoUserPost()
    {
         return $this->with('post');

        // return $this->hasOneThrough(
        //     User::class,    //bảng liên kết tới
        //     Post::class,    // bảng thông qua
        //     'id_post',              // khóa ngoại bảng thông qua
        //     'id',                 // khóa ngoại bảng liên kết tới
        //     'id',                  // khóa chính bảng liên kết
        //     'id'                   // khóa chính bảng thông qua
        // );
        // Ghép bảng thông qua bảng khác
        // return $this->hasManyThrough(
        //     User::class,    //bảng liên kết tới
        //     Post::class,    // bảng thông qua
        //     'id',              // khóa ngoại bảng thông qua
        //     'id',                 // khóa ngoại bảng liên kết tới
        //     'id',                  // khóa chính bảng liên kết
        //     'id_user'                   // khóa chính bảng thông qua
        // );
    }
    // kiểm tra bài viết đã được lưu hay chưa?
    public function checkSavedPosts($id_user, $id_post){
        return $this->where('id_user', $id_user)->where('id_post',$id_post)->first();
    }
    // delete post
    public function deleteUserPost($id_user, $id_post){
        return $this->where('id_user', $id_user)->where('id_post',$id_post)->delete();
    }
    public function getPostByUser($id_user){
        $dataMain = [];
        $dataUser =  $this->join('posts', $this->table.'.id_post', 'posts.id')
                    ->join('users', 'posts.id_user', 'users.id')
                    ->where($this->table.'.id_user', $id_user)
                    ->select('users.*')
                    ->get();
        $dataPost =  $this->join('posts', $this->table.'.id_post', 'posts.id')
                    ->join('users', 'posts.id_user', 'users.id')
                    ->where($this->table.'.id_user', $id_user)
                    ->select('posts.*')
                    ->get();
        $i = 0;
        foreach ($dataUser as $key => $value) {
            $dataMain[$i]['user'] =  $value;
            $i++;
        }
        $j = 0;
        foreach ($dataPost as $key => $value) {
            $dataMain[$j]['post'] =  $value;
            $j++;
        }
        return $dataMain;
    }
}
