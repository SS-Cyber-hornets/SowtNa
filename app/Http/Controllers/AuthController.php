<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        // $user = User::create($request->all());
        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        $user->assignRole('listener');
        $token = $user->createToken('myapptoken')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user,
            'message' => "You are account is successfully created, here is your email: {$user->email}"
        ]);
    }
    public function login(Request $request)
    {
        // $user = User::where('email', $request->email)->where('password', $request->password)->first();
        // if ($user) {
        //     $token = $user->createToken('myapptoken')->plainTextToken;
        //     return response()->json([
        //         'token' => $token,
        //         'user' => $user,
        //     ]);
        // } else {
        //     return response()->json(['error' => 'Your credentail does not match our record'], 401);
        // }
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    // LOGOUT METHODE
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'You Logged out see you later'
        ];
    }
}
