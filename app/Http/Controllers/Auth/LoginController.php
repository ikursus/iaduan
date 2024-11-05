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

    public function logout()
    {
        return redirect('/login');
    }
}
