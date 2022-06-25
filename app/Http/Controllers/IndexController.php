<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\IconRank;
use Illuminate\Support\Facades\Validator;
use App\Models\ImageMessy;


class IndexController extends BaseController
{

    function __construct()
    {
    }
    public function index(){
        return view($this->rootView.'.index');
    }
}
