<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function loginUser()
    {
        return redirect()->route('showHome');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function registerUser()
    {
        return redirect()->route('showLogin');
    }

    public function logout()
    {
        return redirect()->route('showLogin');
    }
}