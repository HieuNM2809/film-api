<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'content',
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
    public function searchLikeAll($key) {
        $sql = $this->with("titleType")->with("user");
        $sql = $sql->where('title', 'LIKE', '%'.$key.'%');
        $sql = $sql->orWhere('content', 'LIKE', '%'.$key.'%');
        return  $sql->get();
    }

}
