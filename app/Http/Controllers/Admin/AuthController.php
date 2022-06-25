<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth as Auth_V2;
use Illuminate\Support\Carbon;

class AuthController extends BaseController
{
    private $table;
    function __construct()
    {
    }
    public function index(Request $request)
    {
       return view($this->rootView.'.Auth.login');
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.exists' => 'Email không tồn tại',
            'password.required' => 'Vui lòng nhập nhập khẩu'
        ]);
        $data = [
            'email' =>$request->email,
            'password' =>$request->password,
            'id_permission'=>2
        ];
        if (Auth_V2::attempt($data)) {
            return redirect('admin');
        }
        return redirect('admin/login')->with('thongbao', 'Email hoặc mật khẩu không đúng !! ');
    }
    public function forgetPassword(Request $request)
    {
       return view($this->rootView.'.Auth.forgetPassword');
    }
    public function logout(Request $request)
    {
        Auth_V2::logout();
        return redirect('admin/login');
    }
}
