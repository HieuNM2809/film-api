<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    protected $listIdPermissionUser = [1];

    public function __construct()
    {
        $this->curentDay = date('d');
        $this->curentMonth = date('m');
        $this->curentYear = date('Y');
        $this->data['adminLogin'] = Session::get('logged_in_admin');
        $this->data['controller'] = '123';
        $this->data['action'] = '';
    }

    public function dataResponse($status, $message ,$data){
        $dataResponse['status'] = (string)$status;
        $dataResponse['message'] = $message;
        $dataResponse['data'] = $data;
        return response()->json($dataResponse);
    }
}
