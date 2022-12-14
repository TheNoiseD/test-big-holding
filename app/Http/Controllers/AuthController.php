<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
    //
    }

    public function login(Request $request): JsonResponse
    {
//        login with sanctum
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('authToken')->plainTextToken;
            return $this->respondWithToken($token);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);

        }
    }

    private function respondWithToken($token):JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
