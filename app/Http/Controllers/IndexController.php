<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\IconRank;
use Illuminate\Support\Facades\Validator;
use App\Models\ImageMessy;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class IndexController extends BaseController
{

    private $userModel;
    private $postModel;
    private $commentModel;
    private $dateNow;
    function __construct()
    {
        parent::__construct();
        $this->userModel = new User();
        $this->postModel = new Post();
        $this->commentModel = new Comment();
        $this->dateNow = [
            'curentDay'=> $this->curentDay,
            'curentMonth'=> $this->curentMonth,
            'curentYear'=> $this->curentYear
        ];
    }
    public function index(){
        $this->responseData['userNewDate']    = $this->userModel->countByCondition($this->userModel, $this->dateNow);
        $this->responseData['postNewDate']    = $this->userModel->countByCondition($this->postModel, $this->dateNow);
        $this->responseData['commentNewDate'] = $this->userModel->countByCondition($this->commentModel, $this->dateNow);
        $this->responseData['reportNewData']  = $this->userModel->countByCondition($this->commentModel, $this->dateNow, 'updated_at');

        $this->responseData['chartMonth'] =  $this->userModel->chartMonth($this->postModel , []);
        $this->responseData['chartYear'] =$this->userModel->chartYear($this->postModel , []);

        return view($this->rootView.'.index', $this->responseData);
    }
}
