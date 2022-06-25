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
    protected $rootView = 'pages';
    protected $curentDay ;
    protected $curentMonth;
    protected $curentYear;
    public function __construct()
    {
        $this->curentDay = date('d');
        $this->curentMonth = date('m');
        $this->curentYear = date('Y');
    }

    public function dataResponse($status, $message ,$data){
        $dataResponse['status'] = $status;
        $dataResponse['message'] = $message;
        $dataResponse['data'] = $data;
        return response()->json($dataResponse);
    }
}
