<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\PaketWisataController;

use App\Http\Controllers\WisataController;

use App\Http\Controllers\PaymentController;

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
Route::post('/login', [AuthController::class, 'destroy'])->name('logouts');



//RESET PASSWORD
Route::middleware('guest')->group(function () {
Route::get('/forgotpassword', [AuthController::class, 'indexOfResetPassword'])->name('res-password');
Route::post('/forgotpassword/reset', [AuthController::class, 'resetPasswordHandler'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'createNewPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'store'])->name('password.update');
});

//LOGIN
Route::get('/login', [AuthController::class, 'indexOfLogin'])->name('login');
Route::post('/login/proses', [AuthController::class, 'login']);


//REGISTER
Route::get('/register', [AuthController::class, 'indexOfRegister'])->name('register');
Route::post('/register/proses', [AuthController::class, 'register']);


//GOOGLE SIGN IN ROUTES
Route::controller(GoogleController::class)->group(function() {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});


//PAKET WISATA
Route::get("/trip", [PaketWisataController::class, 'indexOfTrip'])->name('buat-trip');
Route::post('/paketwisata', [PaketWisataController::class, 'getPaketWisataFilterPertama'])->name('pencarian-paketwisata'); 
Route::get('/paketwisata', [PaketWisataController::class, 'getPaketWisataFilterPertama'])->name('pencarian-paketwisata'); 
Route::post('/paketwisata/filter', [PaketWisataController::class, 'getPaketWisataFilterKedua'])->name('pencarian-paketwisata-filter'); 
Route::get('/paketwisata/filter', [PaketWisataController::class, 'getPaketWisataFilterKedua'])->name('pencarian-paketwisata-filter'); 
Route::get('/paketwisata/detail/{id}', [PaketWisataController::class, 'getById'])->name('detail');
Route::get('/paketwisata/itenary/{id}', [PaketWisataController::class, 'getAllItenarys'])->name('itenary');
Route::get('/paketwisata/itenary/details/{id}', [PaketWisataController::class, 'getItenarysById'])->name('indexofwisata');
Route::get('/paketwisata/payment/{id}', [PaketWisataController::class, 'paymentF'])->name('letspay');
//CRUD SIDE || UPDATE
Route::get('/paketwisata/edit/{id}', [PaketWisataController::class, 'indexOfEditPaketWisata'])->name('edit-paket-wisata');
Route::put('/paketwisata/edit/{id}/update', [PaketWisataController::class, 'update']);
Route::put('/paketwisata/edit/{id}/updateimage', [PaketWisataController::class, 'updateImage'])->name('update.img.pktwisata');
//CRUD SIDE || CREATE
Route::get('/paketwisata/buat', [PaketWisataController::class, 'createIndex'])->name('create-wisata');
Route::post('/paketwisata/buat/berhasil', [PaketWisataController::class, 'create'])->name('paketwisata.create');
Route::get('/paketwisata/{id}/delete', [PaketWisataController::class, 'deletePaketWisata'])->name('paketwisata.delete');



//XENDIT
Route::get('/payment/success/invoice_id', [PaymentController::class, 'index'])->name('payment.success');
Route::post('/payment/create', [PaymentController::class, 'createNewPayment'])->name('xendit');




//DESTINASI
Route::get('/destinasi', [WisataController::class, 'index'])->name('destinasi');
Route::post('/destinasi/filter', [WisataController::class, 'getwisatabyfilter'])->name('destinasi-filter');
Route::get('/destinasi/{id}', [WisataController::class, 'getwisatabyid'])->name('wisata-detail');
Route::get('/destinasi/payment/{id}', [WisataController::class, 'paymentW'])->name('paymentW');

//DESTINASI CRUD SIDE

// CREATE
Route::get('/buat/destinasi', [WisataController::class, 'indexOfCreateWisata'])->name('buat-wisatabaru');
Route::post('/destinasi/buat/berhasil', [WisataController::class, 'createWisataHandler'])->name('wisata.create');

// UPDATE
Route::get('/destinasi/edit/{id}', [WisataController::class, 'indexOfEditWisata'])->name('edit.destinasi');
Route::put('/destinasi/edit/{id}/update', [WisataController::class, 'editWisataHandler']);
Route::put('/destinasi/edit/{id}/update/image', [WisataController::class, 'updateImageWisataHandler']);
Route::put('/destinasi/edit/{id}/update/paketwisataid', [WisataController::class, 'updatePaketWisataId'])->name('updatePaketWisataId');
Route::get('/destinasi/{id}/delete', [WisataController::class, 'deleteWisata'])->name('wisata.delete');


//PROFILE
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('update.profile');





