<?php

namespace App\Http\Controllers;

use App\Models\User;
use Arpon\Http\Request;
use Arpon\Support\Facades\Auth;
use Arpon\Support\Facades\Redirect;
use Arpon\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            return Redirect::to('/profile');
        }

        return Redirect::to('/login')->with('error', 'Invalid credentials');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::login($user);

        return Redirect::to('/profile');
    }

    public function profile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('profile', ['user' => $user]);
        }

        return Redirect::to('/login');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/login');
    }
}
