<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\{RegisterRequest,LoginRequest};
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'user' => $user
            ],201);

        } catch(\Exception $e) {
            return response(['error' => $e->getMessage()],401);
        }
        
    }

    public function login(LoginRequest $request)
    {
        $crendencials = $request->only('email','password');
        try {
            if(!$token = JWTAuth::attempt($crendencials)) {
                return response()->json([
                    'error' => 'inavlid credentials'
                ],400);
            }
        } catch(JWTException $e) {
            return response()->json([
                'error' => 'not create token'
            ],500);
        }
        return response()->json(compact('token'));
    }
}
