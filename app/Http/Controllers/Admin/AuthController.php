<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth as Auth_V2;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\UserToken;

class AuthController extends BaseController
{
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = new UserToken();
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
        $userModel = new User();
        $admin = $userModel->getCheckUserByMail($data['email'], $data['password'], true);
        if($admin){
            $request->session()->put('just-login', true);
            $request->session()->put('logged_in_admin', $admin);
            return redirect('admin');
        }
        return redirect('admin/login')->with('thongbao', 'Email hoặc mật khẩu không đúng !! ');
    }
    public function forgetPassword(Request $request)
    {
       return view($this->rootView.'.Auth.forgetPassword');
    }
    public function postForgetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.exists' => 'Email không tồn tại'
        ]);
        $token = randomString(10);
        $emailUser = $request->email;
        // send mail
        try {
            Mail::send('email.sendTokenAdmin', ['token' => $token], function ($message) use ($emailUser) {
                $message->from(env('MAIL_USERNAME'), 'DEV | GỬI MÃ XÁC NHẬN ĐỔI MẬT KHẨU');
                $message->to($emailUser, 'Hi bạn');
                $message->subject('Gửi mail xác nhận');
            });
            if (count(Mail::failures()) > 0) {
                return redirect('admin/forget-password')->with('thongbao', 'Gửi mã xác nhận thất bại, vui lòng thử lại !! ');
            } else {
                $data = [
                    'email'=> $emailUser,
                    'token'=> $token
                ];
                $this->table->createToken($data);
                return redirect('admin/forget-password')->with('thongbao', 'Gửi mã thành công, vui lòng xem mail để lấy mã !! ');
            }
        } catch (\Exception $e) {
            return redirect('admin/forget-password')->with('thongbao', 'Hệ thống đang bảo trì, vui lòng thử lại sau !! ');
        }
    }


    public function confirmForgetPassword(Request $request){
        return 1;
    }



    public function logout(Request $request)
    {
        $request->session()->forget(['logged_in_admin']);
        Session::flash('error_message', 'Phiên đăng nhập của bạn đã hết hạn, vui lòng đăng nhập lại');
        return redirect('admin/login');
    }
}

