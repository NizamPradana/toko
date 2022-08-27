<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\barangController;
use App\Http\Controllers\dashboard\PesananController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\shopController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('viewLogin');
});

//view login
Route::get('/login', [AuthController::class, 'viewLogin'])->name('viewLogin')->middleware('guest');

// proses login
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

// view register
Route::get('/register', [AuthController::class, 'viewRegister'])->name('viewRegister')->middleware('guest');

// proses register
Route::post('/register', [AuthController::class, 'register'])->name('register');

// proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// role Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // route pesanan
    Route::resource('pesanan', PesananController::class);

    // route barang
    Route::resource('barang', barangController::class);
    Route::post('/barang/statusPajang', [barangController::class , 'updateStatus'])->name('updateStatusBarang');

    // route user
    Route::get('/users', [AuthController::class, 'index'])->name('daftarUser');
    Route::get('/userAdd', [AuthController::class, 'create'])->name('tambahUser');

    // Route pembayaran
    Route::get('/bayar', function(){
        return view('dashboard.pembayaran.index', [
            'title' => 'Pembayaran',
        ]);
    })->name('viewPembayaran');

});


// role User
Route::middleware(['auth', 'role:user'])->group(function(){

    Route::resource('keranjang', KeranjangController::class);

    Route::get('/checkout-alamat', function(){
        return view('mainPage.checkout.alamat');
    });

});
Route::get('/toko', [shopController::class , 'index'])->name('toko');

Route::get('/toko/{id}', [shopController::class, 'singleBarang'])->name('singleBarang');



