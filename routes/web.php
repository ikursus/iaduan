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

    $pageTitle  = 'Rekod Aduan';

    // Contoh data senarai aduan
    $senaraiAduan = [
        ['id' => 1, 'tajuk' => 'Tajuk 1', 'kandungan' => 'Kandungan 1', 'tarikh' => '2024-11-01', 'status' => 'Selesai'],
        ['id' => 2, 'tajuk' => 'Tajuk 2', 'kandungan' => 'Kandungan 2', 'tarikh' => '2024-11-02', 'status' => 'Dalam Proses'],
        ['id' => 3, 'tajuk' => 'Tajuk 3', 'kandungan' => 'Kandungan 3', 'tarikh' => '2024-11-03', 'status' => 'Baru'],
        ['id' => 4, 'tajuk' => 'Tajuk 4', 'kandungan' => 'Kandungan 4', 'tarikh' => '2024-11-04', 'status' => 'Baru'],
        ['id' => 5, 'tajuk' => 'Tajuk 5', 'kandungan' => 'Kandungan 5', 'tarikh' => '2024-11-05', 'status' => 'Baru'],
    ];

    // Cara 1 untuk attach / passing data untuk digunakan di dalam template - method with()
    // return view('pengguna.aduan.template-senarai-aduan')
    // ->with('senaraiAduan', $senaraiAduan)
    // ->with('pageTitle', $pageTitle);

    // Cara 2 untuk attach / passing data untuk digunakan di dalam template - method array()
    // return view('pengguna.aduan.template-senarai-aduan', [
    //     'senaraiAduan' => $senaraiAduan,
    //     'pageTitle' => $pageTitle
    // ]);

    // Cara 3 untuk attach / passing data untuk digunakan di dalam template - method compact()
    return view('pengguna.aduan.template-senarai-aduan', compact('senaraiAduan', 'pageTitle'));

});

Route::get('/aduan/baru', function () {
    return view('pengguna.aduan.template-aduan-baru');
});

Route::get('/logout', function () {
    return redirect('/login');
});
