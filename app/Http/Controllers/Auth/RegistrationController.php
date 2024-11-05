<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function paparBorangRegister()
    {

        return view('authentication.template-register');

    }

    public function simpanDataPendaftaran(Request $request)
    {

    }
}
