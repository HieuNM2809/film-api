<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BackendMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $loggedInAdmin = \Session::get('logged_in_admin');
        $lockScreen = \Session::get('lockScreen');
        $admins = ['2'];

        if ($lockScreen) {
            return redirect('admin/lock-screen')->with('thongbao', 'Bạn đang Lock Screen !! ');
        }

        if (empty($loggedInAdmin)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('admin/login')->with('thongbao', 'Vui lòng đăng nhập để sử dụng !! ');
            }
        }else{
            $idPermission = strtolower($loggedInAdmin->id_permission);
            if(!in_array($idPermission, $admins)){
                return redirect('admin/login')->with('thongbao', 'Vui lòng đăng nhập để sử dụng !! ');
            }
        }
        return $next($request);
    }
}
