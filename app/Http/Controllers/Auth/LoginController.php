<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function paparBorangLogin()
    {
        return view('authentication.template-login');
    }

    public function authenticate(Request $request)
    {
        // Lakukan validasi data yang dikirimkan
        $data = $request->validate([
            'login_email' => 'required|email', // Cara 1 menulis validation rules menggunakan string
            'login_password' => ['required', 'min:3'], // Cara 2 menuliskan validation rules menggunakan array
        ]);

        // Re assign value $data kepada $credentials untuk fungsi auth attempt
        $credentials['email'] = $data['login_email'];
        $credentials['password'] = $data['login_password'];

        // return $request->all();
        // return $request->only('login_email', 'login_password');
        // return $request->except('_token');
        // return $request->input('login_email'); // sama dengan $request->login_email
        // Dump & Die
        // dd($data);
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
