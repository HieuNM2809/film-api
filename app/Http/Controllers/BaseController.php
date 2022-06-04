<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $controller = '';
    protected $action = '';
    protected $pagination = 10;
    protected $responseData = [];
    protected $requestData = [];
    function __construct()
    {
    }

    public function dataResponse($status, $message ,$data){
        $dataResponse['status'] = $status;
        $dataResponse['message'] = $message;
        $dataResponse['data'] = $data;
        return response()->json($dataResponse);
    }
}
