<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\Base;

class TitleType extends Base
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'type',
        'description',
        'color',
    ];


    public function post()
    {
        return $this->hasMany(Post::class, 'id_title_type', 'id');
    }
    public function getListTitleTypeAndCountPost(){
        $data = $this->get();
        $dataReponse = [];
        foreach ( $data  as $key => $value) {
            $value['amount_post'] = Post::where('id_title_type',  $value->id )->get()->count() ?? 0;
            array_push($dataReponse, $value);
        }
        return $dataReponse;
    }
    public function createTitleType($data){
        return $this->create($data);
    }
    public function getTitleTypeAndCountPostById($id){
        $data = $this->where('id', $id)->get();
        $dataReponse = [];
        foreach ( $data  as $key => $value) {
            $value['amount_post'] = Post::where('id_title_type',  $value->id )->get()->count() ?? 0;
            array_push($dataReponse, $value);
        }
        return $dataReponse;
    }
}
