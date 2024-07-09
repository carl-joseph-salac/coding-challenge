<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('login');
    }

    public function loginUser(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => ['required', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/']
        ],[
            'password.regex' => 'At least one uppercase, one lowercase, one digit, and one special character.'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('showHome');
        }
        return back()->withInput($request->except('password'))->with('wrong', 'Wrong Credentials');
    }

    public function showRegister(): View
    {
        return view('register');
    }

    public function registerUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'regex:/^(?![\s\.\-]+$)[a-zA-Z\s\.\-]+$/', 'max:50'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/']
        ],[
            'name.regex' => 'The name field may only contain letters, spaces, dots, and dashes.',
            'password.regex' => 'At least one uppercase, one lowercase, one digit, and one special character.'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('showLogin')->with('registered', 'Registered Successfully');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('showLogin');
    }
}