<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email:dns'
            ],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['successMessage' => 'Berhasil mengirimkan email reset password'])
            : back()->withErrors(['email' => __($status)]);
    }


}