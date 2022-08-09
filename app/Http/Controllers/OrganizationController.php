<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Organization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OrganizationController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new Organization();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $condition['id_user'] = $request->id_user;
        if ($request->expectsJson()) {
            $data = $this->table->get();
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI'),  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id_user' => 'required|numeric|exists:users,id'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        $data=  $request->all();
        if(isset($data['_method'])){
            unset($data['_method']);
        }

        if($request->hasFile('image')) {
            $data['image'] = uploadImage($request, 'image', $this->table);
        }

        $data = $this->table->createByTable($this->table, $data);
        return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') : config('statusCode.FAIL'), $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $condition['id'] = $id;
        if ($request->expectsJson()) {
            $data = $this->table->getByCondition( $this->table, $condition);
            // return $data;
            return $this->dataResponse(!$data->IsEmpty() ? '200' :'404',!$data->IsEmpty() ? config('statusCode.SUCCESS_VI') : config('statusCode.NOT_FOUND_VI'),  $data);
        }
        return view('pages.post.detail', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.post.edit', ['typeSites' => $this->table->find($id)]);
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
        $condition = [];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id_user' => 'required|numeric|exists:users,id'

        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        $organ  = $this->table->find($id);
        if(!$organ){
            return $this->dataResponse('401', 'Không tìm thấy', []);
        }
        if($request->id_user != $organ->id_user){
            return $this->dataResponse('401', 'Bạn Không thể sửa', []);
        }

        $data =  $request->all();
        unset($data['_method']);

        if($request->hasFile('image')) {
            $data['image'] = uploadImage($request, 'image', $this->table);
        }

        $condition['id'] = $id;
        $data = $this->table->updateCondition($this->table, $data ,$condition);
        return  $this->dataResponse($data ?'200' :'404',  $data ? config('statusCode.SUCCESS_VI') : config('statusCode.NOT_FOUND_VI'),$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|numeric|exists:users,id'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }

        if ($request->expectsJson()) {
            $organ  = $this->table->find($id);
            if(!$organ){
                return $this->dataResponse('401', 'Không tìm thấy', []);
            }
            if($request->id_user != $organ->id_user){
                return $this->dataResponse('401', 'Bạn Không thể sửa', []);
            }

            $data = $this->table->where('id', $id)->delete();
            DB::table('user_organizations')->where('id_organization', $id)->delete();
            return $this->dataResponse($data ?'200' :'404', $data ? config('statusCode.SUCCESS_VI') : config('statusCode.NOT_FOUND_VI'),  $data);
        }
        return view('pages.post.detail', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }
}
