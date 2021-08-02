<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        $user = User::create($request->all());
        $token = $user->createToken('myapptoken')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }
    public function login(LoginRequest $request)
    {

        // //Check email
        // $user = User::where('email', $request->email)->first();
        // //Check Password
        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     return response([
        //         'message' => 'Invalid Credentials'
        //     ], 401);
        // }
        // $token = $user->createToken('myapptoken')->plainTextToken;
        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];

        // return response($response, 201);
    }
}
