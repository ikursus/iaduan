<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama
// Format route Route::get('uri', 'action');
Route::get('/', [HomeController::class, 'welcome']);

// Halaman login
// Route yang memanggil controller bersama nama method, haruslah ditulis dalam format array untuk actionnya
Route::get('/login', [LoginController::class, 'paparBorangLogin']);
// Terima data daripada borang login dan authenticate user
Route::post('/login', [LoginController::class, 'authenticate']);
// Log keluar
Route::get('/logout', [LoginController::class, 'logout']);

// Paparkan borang pendaftaran akaun baru
Route::get('/register', [RegistrationController::class, 'paparBorangRegister']);
// Terima data daripada borang pendaftaran akaun baru
Route::post('/register', [RegistrationController::class, 'simpanDataPendaftaran']);

// Routing halaman dashboard menggunakan invokable method (single action controller)
// Route yang memanggil single action controller, hanya perlu tulis tanpa array dan tanpa nama method untuk actionnya
Route::get('/dashboard', DashboardController::class);


// Paparkan borang edit profile
Route::get('/profile', [ProfileController::class, 'edit']);
// Terima data daripada borang edit profile dan kemaskini data ke dalam database
Route::patch('/profile', [ProfileController::class, 'update']);

// Route untuk memaparkan senarai rekod aduan
Route::get('/aduan', [AduanController::class, 'index']);
// Route untuk memaparkan borang tambah aduan baru
Route::get('/aduan/baru', [AduanController::class, 'create']);
// Route untuk terima data daripada borang tambah aduan baru
Route::post('/aduan/baru', [AduanController::class, 'store']);
// Route untuk memaparkan borang edit aduan
Route::get('/aduan/{id}/edit', [AduanController::class, 'edit']);
// Route untuk terima data daripada borang edit aduan
Route::patch('/aduan/{id}/edit', [AduanController::class, 'update']);
// Route untuk hapus data daripada table aduan
Route::delete('/aduan/{id}', [AduanController::class, 'destroy']);

// Resource Controller
// Route::resource('aduan', AduanController::class);
