<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FilterWisataController;
use App\Http\Middleware\Auths;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", function() {
    return view('home');
})->name('home');

Route::get("/login", function () {
    return view('login');
});


//LOGOUT
Route::post('/login', [LogoutController::class, 'destroy'])->name('logouts');


//LOGIN
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login/proses', [LoginController::class, 'login']);

//REGISTER
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/proses', [RegisterController::class, 'register']);

//GOOGLE SIGN IN ROUTES
Route::controller(GoogleController::class)->group(function() {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

//PAKET WISATA
Route::get("/filterwisata", [FilterWisataController::class, 'index'])->name('filterwisata');
Route::get("/paketwisata", [FilterWisataController::class, 'hasilwisata'])->name('wisataresult');
Route::post('/mencaripaketwisata', [FilterWisataController::class, 'getpaketwisatabyfilter'])->name('kirim_paket_wisata'); 