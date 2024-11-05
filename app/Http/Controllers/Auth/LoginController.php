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
