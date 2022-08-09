<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\IconRank;
use Illuminate\Support\Facades\Validator;
use App\Models\ImageMessy;

class ImageMessyController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new ImageMessy();
    }
    public function uploadImageMessy(Request $request){
        $folder = 'Messy';
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        $data = $request->all();
        $data['image'] = uploadImage($request, 'image', $folder);
        $data = $this->table->createByTable($this->table, $data);
        if($data){
            $data['url'] =  request()->getHttpHost().'/'.$folder.'/'.$data['image'];
        }
        return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') : config('statusCode.FAIL'),$data);

    }
}
