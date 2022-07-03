<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController;
use App\Models\UserToken;
use App\Models\User;

class MailController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new UserToken();
    }

    public function sendMailForgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        $token = randomString(10);
        $emailUser = $request->email;
        // send mail
        try {
            Mail::send('email.sendToken', ['token' => $token], function ($message) use ($emailUser) {
                $message->from(env('MAIL_USERNAME'), 'DEV | GỬI MÃ XÁC NHẬN ĐỔI MẬT KHẨU');
                $message->to($emailUser, 'Hi bạn');
                $message->subject('Gửi mail xác nhận');
            });
            if (count(Mail::failures()) > 0) {
                return  $this->dataResponse('500', config('statusCode.FAIL_VI'), []);
            } else {
                $data = [
                    'email'=> $emailUser,
                    'token'=> $token
                ];
                $this->table->createToken($data);
                return  $this->dataResponse('200',  config('statusCode.SUCCESS_VI'), []);
            }
        } catch (\Exception $e) {
            return $this->dataResponse('500',  $e->getMessage() , []);
        }
    }
    public function confirmTokenForgetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|exists:users,email',
            'token'    => 'required',
            'password_new' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        $userToken =   $this->table->getTokenByMail($request->email);
        if($userToken){
            ///2022-06-25 08:05:00       ///2022-06-25 08:15:00
            if(strtotime($userToken['created_at']) > time() - 60*5) {
                if($request->token == $userToken['token']){
                    $checkUpdate =  (new User())->updatePasswordByEmail($request->email,Hash::make($request->password_new));
                    return  $this->dataResponse('200',  $checkUpdate ? config('statusCode.SUCCESS_VI') : config('statusCode.FAIL_VI'),$checkUpdate);
                }
                return  $this->dataResponse('200', 'Token sai token', []);
            } else {
                return  $this->dataResponse('200', 'Token Hết hạn hoặc sai', []);
            }
        }
        return  $this->dataResponse('200', config('statusCode.FAIL_VI'), []);
    }
}
