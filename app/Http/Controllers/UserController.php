<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
            // 'email' => 'required|email|unique:users,email',
            // 'password' => 'required|min:6',
            // 'id_permission'=> 'required|integer|exists:permissions,id',
            // 'identity_card'=> 'required|min:9',
            // 'birthday'=> 'required|date_format:Y-m-d|before:today',
            // 'avatar' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            // 'url'=> 'required|url',
            // 'location'=> 'required',
            // 'bio'=> 'required',
            // 'currently_learning'=> 'required',
            // 'skills'=> 'required',
            // 'work'=> 'required',
            // 'education'=> 'required'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        $data = $request->all();
        $data['avatar'] = uploadImage($request, 'avatar', 'User');
        $data['password'] = Hash::make($request->password);
        $data = $this->table->create($data);
        return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') : config('statusCode.FAIL'), []);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if ($request->expectsJson()) {
            $data = $this->table->find($id);
            return $this->dataResponse($data ? '200' : '404', $data ? config('statusCode.SUCCESS_VI') : config('statusCode.NOT_FOUND_VI'),  $data);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'id_permission'=> 'required|integer|exists:permissions,id',
            // 'identity_card'=> 'required|min:9',
            // 'birthday'=> 'required|date_format:Y-m-d|before:today',
            // 'url'=> 'required|url',
            // 'location'=> 'required',
            // 'bio'=> 'required',
            // 'currently_learning'=> 'required',
            // 'skills'=> 'required',
            // 'work'=> 'required',
            // 'education'=> 'required'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        // if($request->has('email')){
        //     $check = $this->table->where('email',$request->email)->first();
        //     if($check){
        //         $message =[
        //           'name' => "Email already in use."
        //         ];
        //         return $this->dataResponse('401', $message, []);
        //     }
        // }
        $data =  $request->all();
        if (isset($data['_method'])) {
            unset($data['_method']);
        }
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }
        if ($request->hasFile('avatar')) {
            $data['avatar'] = uploadImage($request, 'avatar', 'User');
        }
        $data = $this->table->where("id", $id)->update($data);
        return  $this->dataResponse($data ? '200' : '404',  $data ? config('statusCode.SUCCESS_VI') : config('statusCode.NOT_FOUND_VI'), []);
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

    public function registerGoogleMobile(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->dataResponse('401', $validation->errors(), []);
        }
        $checkIssetUser =  (new User())->getCheckUserByMail($request->email, $request->password);
        if (!$checkIssetUser) {
            $user = User::create([
                'name' => '',
                'email' => $request->email,
                'id_permission' => 1,
                'password' => Hash::make($request->password),
            ]);
            return $this->dataResponse('200', $user ? config('statusCode.SUCCESS_VI') : config('statusCode.FAIL'), $user);
        }
        return $this->dataResponse('200',  $checkIssetUser ? config('statusCode.SUCCESS_VI') : config('statusCode.FAIL'), $checkIssetUser);
    }

    // search user
    public function searchUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        if ($request->expectsJson()) {
            $data = $this->table->searchLikeAll($request->key);
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI'),  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }
    // thay đổi mật khẩu
    public function changePass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'password_new' => 'required|min:8|different:password',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }

        $checkIssetUser =  (new User())->getCheckUserByMail($request->email, $request->password);
        if ($checkIssetUser) {
            $data =  (new User())->updateByEmail($request->email, ['password' => Hash::make($request->password_new)]);
            return $this->dataResponse('200', $data ? config('statusCode.SUCCESS_VI') : config('statusCode.FAIL_VI'), $data);
        } else {
            return $this->dataResponse('200', 'Mật khẩu cũ không đúng', []);
        }
    }

    public function lockScreen(Request $request)
    {
        if ($request->isMethod('get')) {
            if(!Session::get('lockScreen')){
                $dataLock['email'] = Session::get('logged_in_admin')['email'];
                $dataLock['avatar'] = Session::get('logged_in_admin')['avatar'];
                $dataLock['name'] = Session::get('logged_in_admin')['name'];
                $request->session()->put('lockScreen',$dataLock);
                $request->session()->forget(['logged_in_admin']);
            }
            return view($this->rootView.'.Auth.lockScreen');
        } else {
            $this->validate($request, [
                'password' => 'required'
            ], [
                'password.required' => 'Vui lòng nhập nhập khẩu'
            ]);
            $userModel = new User();
            $admin = $userModel->getCheckUserByMail(Session::get('lockScreen')['email'], $request->password, true);
            if($admin){
                $request->session()->put('just-login', true);
                $request->session()->put('logged_in_admin', $admin);
                $request->session()->forget(['lockScreen']);
                return redirect('admin');
            }
            return redirect('admin/lock-screen')->with('thongbao', 'Mật khẩu không đúng !! ');
        }
    }
}
