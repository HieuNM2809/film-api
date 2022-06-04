<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentsController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new Comment();
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $data = $this->table->getListComment();
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
        }
        return view('pages.comment.list');
    }
    //  get comment by post
    public function getComment(Request $request){

        $validator = Validator::make($request->all(), [
            'idPost' => 'required|numeric',
            'from' => 'required|numeric',
            'to' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }

        if ($request->expectsJson()) {
            $data = $this->table->getCommentById($request->idPost, $request->from, $request->to);
            return $this->dataResponse('200','Thành công' ,  $data);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.comment.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.comment.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.comment.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
