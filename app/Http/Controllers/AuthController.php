<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function handleLogin(LoginRequest $request)
    {
        $data = $request->validated();

        $remember = $request->has('remember');

        $loginField = filter_var($data['email_or_username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (!Auth::attempt([$loginField => $data['email_or_username'], 'password' => $data['password']], $remember)) {
            return back()->withErrors([
                'email_or_username' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->route('songs.index');

    }


    public function handleRegister(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
