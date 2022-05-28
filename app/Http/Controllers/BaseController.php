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
}
