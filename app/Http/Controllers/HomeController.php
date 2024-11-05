<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Function
    // public
    // protected
    // private
    public function welcome()
    {
        return view('welcome'); // resources/view/welcome.php atau welcome.blade.php
    }
}
