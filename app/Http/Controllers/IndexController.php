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
        $this->responseData['userNewDate']    = $this->postModel->countByCondition($this->userModel, $this->dateNow);
        $this->responseData['postNewDate']    = $this->postModel->countByCondition($this->postModel, $this->dateNow);
        $this->responseData['commentNewDate'] = $this->postModel->countByCondition($this->commentModel, $this->dateNow);
        $this->responseData['reportNewData']  = $this->postModel->countByCondition($this->commentModel, $this->dateNow, 'updated_at');

        $this->responseData['chartMonth'] =  $this->postModel->chartMonth($this->postModel , []);
        $this->responseData['chartYear'] =$this->postModel->chartYear($this->postModel , []);

        return view($this->rootView.'.index', $this->responseData);
    }
}
