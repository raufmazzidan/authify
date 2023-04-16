<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'dob' => ['required', 'date'],
            'password' => Password::min(10)->mixedCase()->numbers()->symbols()->uncompromised(),
        ]);

        $payload['password'] = Hash::make($payload['password']);

        User::create($payload);

        return redirect('/login')->with('successMessage', 'Account successfully created.');
    }
}