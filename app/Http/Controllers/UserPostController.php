<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\UserPost;
use Illuminate\Support\Facades\Validator;

class UserPostController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new UserPost();
    }
    public function savePostByUser(Request $request){
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|numeric|exists:users,id',
            'id_post' => 'required|numeric|exists:posts,id'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        // kiểm tra post đã được lưu hay chưa
        if($this->table->checkSavedPosts($request->id_user, $request->id_post)){
            return $this->dataResponse('200', 'Bài viết đã được lưu' , []);
        }
        $data = $this->table->createByTable($this->table, $request->all());
        return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.FAIL') , []);
    }
    public function unSavePostByUser(Request $request){
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|numeric|exists:users,id',
            'id_post' => 'required|numeric|exists:posts,id'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        // kiểm tra post đã được lưu hay chưa
        if(!$this->table->checkSavedPosts($request->id_user, $request->id_post)){
            return $this->dataResponse('200', 'Bạn chưa lưu bài viết này' , []);
        }
        $data = $this->table->deleteUserPost($request->id_user, $request->id_post);
        return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.FAIL') , []);
    }
    public function listPostByUser(Request $request){
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|numeric|exists:users,id'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        $data = $this->table->with("user")->with("post")->where('id_user', $request->id_user)->get();
        return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
    }

}
