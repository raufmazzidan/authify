<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    protected $maxAttempts = 1;
    protected $decayMinutes = 1;
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if (RateLimiter::tooManyAttempts(request()->ip(), 3)) {
            $request->session()->flash('count', 30);
            return back()->with('errorMessage', 'Anda telah memasukkan password salah sebanyak 3 kali. ');
        }
        $request->validate([
            'email' => [
                'required',
                'email:dns'
            ],
            'password' => Password::min(10)->mixedCase()->numbers()->symbols()->uncompromised(),
            'captcha' => 'required|captcha'
        ]);

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            RateLimiter::clear(request()->ip());
            return redirect()->intended('/');
        } else {
            RateLimiter::hit(request()->ip(), 30);
        }

        return back()->with('errorMessage', 'Email, atau password yang Anda masukkan salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}