<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email_or_username)
            ->orWhere('username', $request->email_or_username)
            ->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $fieldType = $user->email === $request->email_or_username ? 'email' : 'username';


        if (!Auth::attempt([$fieldType => $request->email_or_username, 'password' => $request->password])) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('API Token')->plainTextToken;


        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user->only(['id', 'name', 'email', 'username']),
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return response()->json([
            'message' => 'Successfully created',
            'user' => $user->only(['id', 'name', 'email', 'username'])
        ]);

    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
