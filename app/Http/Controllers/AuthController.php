<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
        public function showLoginForm()
    {
        return view('auth.login');
    }
        public function showRegisterForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required | email | unique:users,email',
            'fullname' => 'required | string | max:255',
            'username' => 'required | string | max:255',
            'password' => 'required | string | min:8 | confirmed',
            'confirmpassword' => 'required | string | min:8 | confirmed',
        ]);

        $user = Auth::create([
            'email' => $validated ['email'],
            'fullname' => $validated ['fullname'],
            'username' => $validated ['username'],
            'password' => Hash::make($validated) ['password'],
            'confirmpassword' => Hash::make($validated) ['confirmpassword'],
        ]);

        
        Auth::login($user);
        return redirect('/dashboard');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
    

