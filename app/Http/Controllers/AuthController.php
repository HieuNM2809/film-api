<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{

    public function __construct(Request $request)
    {

       $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {

        $validation = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validation->fails()){
            return $this->dataResponse('401',$validation->errors(),  []);
        }

        $credentials = $request->only('email', 'password');

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);

    }

    public function register(Request $request){
        $validation = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validation->fails()){
            return $this->dataResponse('401',$validation->errors(),  []);
        }

        $data =   [
            'name' => $request->name,
            'email' => $request->email,
            'id_permission' => 1,
            'password' => Hash::make($request->password),
        ];
        if(isset($request->avatar)){
            $data['avatar'] = $request->avatar;
        }
        if(isset($request->birthday)){
            $data['birthday'] = $request->birthday;
        }

        $user = User::create($data);

        return $this->login($request);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    public function me()
    {
        $data = auth()->user();
        $data['message'] = 'success';
        $data['status'] = "200";
        return response()->json($data);
    }

    protected function respondWithToken($token)
    {
        return [
            'status' => 1,
            'message'=> 'success',
            'data' => [
                'profile'=> auth()->user(),
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ];
    }

}
