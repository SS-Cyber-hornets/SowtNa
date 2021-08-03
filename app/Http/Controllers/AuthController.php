<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user) {
            $token = $user->createToken('myapptoken')->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => $user,
            ]);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    // LOGOUT METHODE
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
