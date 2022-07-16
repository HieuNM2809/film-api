<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController2 extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new User();
        $this->controllerName = 'UserController2';
        $this->controllerView = 'pages.user2';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->all()) && $request->ajax()) {
            $condition['name'] = $request->name ??'';
            $condition['email'] =  $request->email ??'';
            $condition['identity_card'] = $request->identity_card ??'';
            $condition['skills'] = $request->skills ??'';

            return  $this->table->getDataUserByCondition($condition);
        }
        $this->dataResponse['controllerName'] = $this->controllerName;

        return view($this->controllerView.'.listUser',   $this->dataResponse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = date('Y-m-d');
        return view($this->controllerView.'.addUser' , ['today'=>$today]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'birthday'=> 'required|date_format:Y-m-d|before:today',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'avatar' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'avatar' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            // |numeric|between:9,11
        ],[
            'birthday.before'           => 'Vui lòng chọn ngày sinh nhỏ hơn ngày hiện tại',
            'birthday.required'           => 'Vui lòng chọn ngày sinh',
            'name.required'     => 'Vui lòng nhập tên',
            'email.required'     => 'Vui lòng nhập email',
            'email.email'     => 'Sai định dạng email',
            'emai.unique'     => 'Email đã tồn tại',
            'avatar.required'     => 'Vui lòng chọn ảnh',
            'password.required'     => 'Vui lòng nhập mật khẩu',
            'password.min'     => 'Độ dài mật khẩu lớn hơn 6 6 ký tự',
            'avatar.mimes'     => 'Vui lòng chọn đúng định dạng ảnh jpeg,jpg,png,gif ',
        ]);
        $data = $request->all();
        $data['avatar'] = uploadImage($request, 'avatar', 'User');
        $data['password'] = Hash::make($request->password);
        $data = $this->table->create($data);
        if($data){
            return back()->with('success', 'Sửa thành công');
        }
        return back()->with('error', 'Sửa thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $dataReponse['adminLogin'] = User::findOrFail($id);
        return view($this->rootView.'.user2.edit', $dataReponse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $this->validate($request,[
                'birthday'=> 'required|date_format:Y-m-d|before:today',
            ],[
                'birthday.required'     => 'Vui lòng chọn ngày sinh',
                'birthday.before'           => 'Vui lòng chọn ngày sinh nhỏ hơn ngày hiện tại'
            ]);
        $data =  $request->all();
        if(isset($data['_token'])){
            unset($data['_token']);
        }
        if(isset($data['_method'])){
            unset($data['_method']);
        }
        if ($request->hasFile('avatar')) {
            $data['avatar'] = uploadImage($request, 'avatar', 'User');
        }
        $data = User::where("id", $request->id)->update($data);
        if($data){
            return back()->with('success', 'Sửa thành công');
        }
        return back()->with('error', 'Sửa thất bại');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->expectsJson()) {
            $data = $this->table->where('id', $id)->delete();
            return $this->dataResponse($data ? '200' : '404', $data ? config('statusCode.SUCCESS_VI') : config('statusCode.NOT_FOUND_VI'),  $data);
        }
        return view('pages.post.detail', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }




}
