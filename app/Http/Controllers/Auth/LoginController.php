<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function paparBorangLogin()
    {
        return view('authentication.template-login');
    }

    public function authenticate(Request $request)
    {
        // Lakukan validasi data yang dikirimkan
        $request->validate([
            'login_email' => 'required|email', // Cara 1 menulis validation rules menggunakan string
            'login_password' => ['required', 'min:3'], // Cara 2 menuliskan validation rules menggunakan array
        ]);

        // return $request->all();
        // return $request->only('login_email', 'login_password');
        // return $request->except('_token');
        return $request->input('login_email'); // sama dengan $request->login_email
    }

    public function logout()
    {
        return redirect('/login');
    }
}
