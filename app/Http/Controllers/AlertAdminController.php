<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use App\Models\AlertAdmin;

class AlertAdminController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new AlertAdmin();
    }
    public function createAlert(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'id_user' => 'required|numeric|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        $data = $this->table->createByTable($this->table,$request->all());
        return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.FAIL') , []);
    }
    public function showAlert(Request $request){
        if ($request->ajax()) {
            return  $this->table->getData();
        }
        return view('pages.AlertAdmin.listAlert');
    }
}
