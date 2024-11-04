<?php

use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {

    return view('welcome'); // resources/view/welcome.php atau welcome.blade.php

});

// Halaman login
Route::get('/login', function () {

    return view('authentication.template-login');

});

// Halaman register
Route::get('/register', function () {

    return view('authentication.template-register');

});


// Routing halaman pengguna
Route::get('/dashboard', function () {
    return view('pengguna.template-dashboard');
});

Route::get('/profile', function () {
    return view('pengguna.template-profile');
});

Route::get('/aduan', function () {
    return view('pengguna.aduan.template-senarai-aduan');
});

Route::get('/aduan/baru', function () {
    return view('pengguna.aduan.template-aduan-baru');
});
