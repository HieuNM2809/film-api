<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckApiToken
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
        if(!empty(trim($request->header('Authorization'))))
        {
                $is_exists = User::where('id' , Auth::guard('api')->id())->exists();
                if($is_exists){
                    return $next($request);
                }
                return response()->json([
                    'status' => 401,
                    'message' => 'Mã token không hợp lệ'
                ], 401);
        }
        return response()->json([
            'status' => 401,
            'message' => 'chưa truyền mã token'
        ], 401);
    }
}
