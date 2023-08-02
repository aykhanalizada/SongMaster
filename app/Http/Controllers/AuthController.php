<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }


    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username'=>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended(route('person.index'));

    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email_or_username' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        $fieldType = filter_var($request->email_or_username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $request->email_or_username, 'password' => $request->password], $remember)) {
            return redirect()->intended(route('person.index'));
        } else {
            return back()->withErrors([
                'email_or_username' => 'The provided credentials do not match our records.',
            ]);
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }





}
