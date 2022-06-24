<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserOrganization;

class UserOrganizationsController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new UserOrganization();
    }

    // public function index(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'id_user' => 'required|numeric|exists:users,id'
    //     ]);
    //     if ($validator->fails()) {
    //         return $this->dataResponse('401', $validator->errors() , []);
    //     }
    //     $condition['id_user'] = $request->id_user;
    //     if ($request->expectsJson()) {
    //         $data = $this->table->getByCondition($this->table, $condition);
    //         return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
    //     }
    //     return view('pages.donate.list');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.donate.add');
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
            'id_user' => 'required|numeric|exists:users,id',
            'id_organization' => 'required|numeric|exists:organizations,id'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        if ($request->expectsJson()) {
            $data = $this->table->createByTable($this->table,$request->all());
            return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.FAIL') , $data );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id, Request $request)
    // {
    //     if ($request->expectsJson()) {
    //         $data = $this->table->find($id);
    //         return $this->dataResponse($data ? '200' : '404', $data ? config('statusCode.SUCCESS_VI') : config('statusCode.NOT_FOUND_VI'),  $data);
    //     }
    //     return view('pages.post.detail', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.donate.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'id_user' => 'required|numeric|exists:users,id',
    //         'id_icon' => 'required|numeric|exists:icon_ranks,id'
    //     ]);
    //     if ($validator->fails()) {
    //         return $this->dataResponse('401', $validator->errors() , []);
    //     }
    //     $data = $request->all();
    //     if(isset($data['_method'])){
    //         unset($data['_method']);
    //     }
    //     if ($request->expectsJson()) {
    //         $data = $this->table->updateCondition($this->table,$data, ['id'=>$id]);
    //         return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.FAIL') , []);
    //     }
    // }

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
