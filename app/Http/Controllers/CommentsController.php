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
        if(isset($request['id'])){
            return  $this->dataResponse('200',  config('statusCode.FAIL') , []);
        }
        $validator = Validator::make($request->all(), [
            'id_post' => 'required|numeric|exists:posts,id',
            'parent' => 'required|numeric|exists:comments,id',
            'id_user' => 'required|numeric|exists:users,id',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }

        if ($request->expectsJson()) {
            $data = $this->table->createByTable($this->table,$request->all());
            return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.FAIL') , []);
        }
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
        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        $data = $request->all();
        if(isset($data['_method'])){
            unset($data['_method']);
        }
        if ($request->expectsJson()) {
            $data = $this->table->updateCondition($this->table,$data, ['id'=>$id]);
            return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.FAIL') , []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->expectsJson()) {
            $data = $this->table->where('id', $id)->delete();
            return $this->dataResponse($data ?'200' :'404', $data ? config('statusCode.SUCCESS_VI') :config('statusCode.NOT_FOUND_VI'),  $data);
        }
    }


}
