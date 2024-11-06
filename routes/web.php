<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JenisAduanController;
use App\Http\Controllers\Auth\RegistrationController;

// Halaman utama
// Format route Route::get('uri', 'action');
Route::get('/', [HomeController::class, 'welcome'])->name('name.home');

// Halaman login
// Route yang memanggil controller bersama nama method, haruslah ditulis dalam format array untuk actionnya
Route::get('/login', [LoginController::class, 'paparBorangLogin'])->name('login');
// Terima data daripada borang login dan authenticate user
Route::post('/login', [LoginController::class, 'authenticate'])->name('name.login.authenticate');

// Paparkan borang pendaftaran akaun baru
Route::get('/register', [RegistrationController::class, 'paparBorangRegister'])->name('name.register.form');
// Terima data daripada borang pendaftaran akaun baru
Route::post('/register', [RegistrationController::class, 'simpanDataPendaftaran'])->name('name.register.store');

// Log keluar
Route::get('/logout', [LoginController::class, 'logout'])->name('name.logout')->middleware('auth');

// Cara 1 tulis Route Group
// Route::middleware('auth')->group(function () {

// });

// Route::prefix('dashboard')->group(function () {

// });

// Route::name('name.')->group(function () {

// });

// Cara 2 tulis Route Group
// Route::group(['middleware' => 'auth'], function () {});
Route::group([
    'middleware' => 'auth',
    // 'prefix' => 'dashboard',
    // 'as' => 'name.',
], function () {

    // Routing halaman dashboard menggunakan invokable method (single action controller)
    // Route yang memanggil single action controller, hanya perlu tulis tanpa array dan tanpa nama method untuk actionnya
    Route::get('/dashboard', DashboardController::class)->name('name.dashboard');

    // Paparkan borang edit profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('name.profile.edit');
    // Terima data daripada borang edit profile dan kemaskini data ke dalam database
    Route::patch('/profile', [ProfileController::class, 'update'])->name('name.profile.update');

    // Route untuk memaparkan senarai rekod aduan
    Route::get('/aduan', [AduanController::class, 'index'])->name('name.aduan.index');
    // Route untuk memaparkan borang tambah aduan baru
    Route::get('/aduan/baru', [AduanController::class, 'create'])->name('name.aduan.create');
    // Route untuk terima data daripada borang tambah aduan baru
    Route::post('/aduan/baru', [AduanController::class, 'store'])->name('name.aduan.store');
    // Route untuk memaparkan borang edit aduan
    Route::get('/aduan/{id}/edit', [AduanController::class, 'edit'])->name('name.aduan.edit');
    // Route untuk terima data daripada borang edit aduan
    Route::patch('/aduan/{id}/edit', [AduanController::class, 'update'])->name('name.aduan.update');
    // Route untuk hapus data daripada table aduan
    Route::delete('/aduan/{id}', [AduanController::class, 'destroy'])->name('name.aduan.destroy');

    // Resource Controller
    // Route::resource('aduan', AduanController::class);
    Route::resource('/jenis-aduan', JenisAduanController::class);

});
