<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

        
    public function login(Request $request){
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
                ['password' => bcrypt($request->password)]
        ));
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Compte crée',
            'token' => $token,
        ], 201);
    }

    public function logout() {
        $this->guard()->logout();
        return response()->json([
        'status' => 'success',
        'msg' => 'Logged out Successfully.'
        ], 200);
    }

    private function guard()
    {
        return Auth::guard();
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    public function userProfile() {
        return response()->json(auth()->user());
    }

    protected function createNewToken($token){
        return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60,
        'user' => auth()->user()
        ]);
    }
}
