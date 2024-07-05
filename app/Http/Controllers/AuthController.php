<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('showHome');
        }
        return back()->withInput($request->except('password'))->with('wrong', 'Wrong Credentials');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('showLogin')->with('registered', 'Registered Successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('showLogin');
    }
}