<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function registerUser(RegisterUserRequest $request)
    {
        $input = $request->validated();

        $user = User::make([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->save();

        return redirect(null, 202)->route('auth.login.form');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginUser(LoginUserRequest $request)
    {
        $input = $request->validated();

        if (Auth::attempt($input)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
