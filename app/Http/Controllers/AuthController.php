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

        $remember = $request->has('remember');

        $user = User::where('email', $request->email_or_username)
            ->orWhere('username', $request->email_or_username)
            ->first();

        if (!$user || !Auth::attempt([$this->getLoginField($user, $request), 'password' => $request->password], $remember)) {
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

    private function getLoginField(User $user, LoginRequest $request): string
    {
        return $user->email === $request->email_or_username ? 'email' : 'username';
    }

}
