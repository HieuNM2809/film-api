<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Base
{
    use HasFactory, SoftDeletes;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'number_bad_reports',
        'id_title_type',
        'feature_image',
        'id_user',
    ];
    public function titleType()
    {
        return $this->belongsTo(TitleType::class, 'id_title_type', 'id');
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

    public function createPost($data) : bool{
        try {
            DB::beginTransaction();
            $this->create($data);
            DB::commit();
            return true;
        } catch (\PDOException $e) {
            DB::rollBack();
            return false;
        }
    }
    public function updatePost($data, $id) {
        return $this->where('id',$id)->update($data);
    }
    public function getPostById( $id) {
        return $this->where('id',$id)->first();
    }

    public function searchLikeAll($key) {
        $sql = $this->with("titleType")->with("user");
        $sql = $sql->where('title', 'LIKE', '%'.$key.'%');
        $sql = $sql->orWhere('content', 'LIKE', '%'.$key.'%');
        return  $sql->get();
    }

    // search theo user + tiêu đề bài viết + chủ đề
    public function searchUserPostTitletype($key) {
        $sql = $this->with("titleType")->with("user");
        $sql = $sql->join('users', 'users.id', $this->table.'.id_user');
        $sql = $sql->join('title_types', 'title_types.id', $this->table.'.id_title_type');

        $sql = $sql->where($this->table.'.title', 'LIKE', '%'.$key.'%');
        $sql = $sql->orWhere($this->table.'.content', 'LIKE', '%'.$key.'%');
        $sql = $sql->orWhere('title_types.type', 'LIKE', '%'.$key.'%');
        $sql = $sql->orWhere('title_types.description', 'LIKE', '%'.$key.'%');
        $sql = $sql->orWhere('users.name', 'LIKE', '%'.$key.'%');
        $sql = $sql->orWhere('users.email', 'LIKE', '%'.$key.'%');

        return  $sql->get();
        // return  $this->toSqlString($sql);
    }


}
