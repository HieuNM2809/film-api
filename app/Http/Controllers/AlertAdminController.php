<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use App\Models\AlertAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AlertAdminController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new AlertAdmin();
    }
    public function createAlert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'id_user' => 'required|numeric|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors(), []);
        }
        $data = $this->table->createByTable($this->table, $request->all());
        return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') : config('statusCode.FAIL'), []);
    }
    public function showAlert(Request $request)
    {
        if ($request->ajax()) {
            return  $this->table->getData();
        }
        return view('pages.AlertAdmin.listAlert');
    }
    public function sendMail(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('email.sendAllAd');
        } else {

            // {
            //     "_token": "cyV856nEeYL7UoK1HTjYT66RpHoQji3lPuXhuj85",
            //     "_method": "POST",
            //     "TieuDe": "title",
            //     "TomTat": "<p>content</p>",
            //     "link": "link",
            //     "nhapTaiKhoan": "on",
            //     "taiKhoan": "nguyenminhhieuk3@gmail.com, HieuMinh@gmail.com, Hieu@gmail.com, Teo123@gmail.com"
            // }

            // kiem tra tham so truyen vao
            $this->validate($request, [
                'TieuDe' => 'required|min:6',
                'TomTat' => 'required|min:12',
                'link'   => 'required'
            ], [
                'TieuDe.required' => 'Bạn chưa nhập tiêu đề',
                'TieuDe.min'      => 'Tiêu đề ít nhất 6 ký tự',
                'TomTat.required' => 'Bạn chưa nhập tóm tắt',
                'TomTat.min'      => 'Tóm tắt ít nhất 12 ký tự',
                'link.required'   => 'Bạn chưa nhập link'
            ]);

            // chuyen data sang mang
            $TieuDe =  $request->TieuDe;
            $TomTat = $request->TomTat;
            $link   = $request->link;
            $data = [
                'TieuDe' => $TieuDe,
                'TomTat' => $TomTat,
                'link'   => $link
            ];

            $email = [];

            // gui email theo ý ng dùng
            if (isset($request->nhapTaiKhoan)) {
                // cắt chuỗi tài khoản
                $str = $request->taiKhoan;
                $subStr = str_replace(' ', '', $str);  // loại bỏ khoảng trắng
                $subStr = explode(',', $subStr);     // cắt theo dấu phẩy

                foreach ($subStr as $st) {
                    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $st)){
                        return back()->with('error', 'Sai định dạng email gửi');
                    }
                }
                $email  =  $subStr;
            } else {
                // gửi tất cả

                // chuyen data gmail sang mang
                $lstuserGmail = User::whereIn('id_permission', $this->listIdPermissionUser)->get();
                // chuyen sang mang
                foreach ($lstuserGmail as $ug) {
                    $email[] =  $ug->email;
                }
            }
             // send mail
            try {
                Mail::send('email.adMail', $data , function ($message) use ($email){
                    $message->from(env('MAIL_USERNAME'), 'DEV');
                    $message->to($email, 'Bạn');
                    $message->subject('DEV thông báo');
                });
                if (count(Mail::failures()) > 0) {
                    return  back()->with('error', 'Gửi quảng cáo thất bại, vui lòng thử lại !! ');
                } else {
                    return  back()->with('success', 'Gửi quảng cáo thành công !! ');
                }
            } catch (\Exception $e) {
                return back()->with('error', 'Hệ thống đang bảo trì, vui lòng thử lại sau !! ');
            }
        }
    }
    public function sendMessage(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('message.sendMessage');
        } else {
        }
    }
}
