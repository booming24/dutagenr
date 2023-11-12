<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::prefix('voucher')->group(function () {
        // user
        Route::get('/', [App\Http\Controllers\VoucherController::class, 'index'])->name('voucher');
        Route::post('/store', [App\Http\Controllers\VoucherController::class, 'store'])->name('voucher-store');
        Route::get('/delete/{id}', [App\Http\Controllers\VoucherController::class, 'destroy'])->name('voucher-delete');
    });

    Route::prefix('peserta')->group(function () {
        // user
        Route::get('/', [App\Http\Controllers\PesertaController::class, 'index'])->name('peserta');
        Route::get('/add', [App\Http\Controllers\PesertaController::class, 'create'])->name('peserta-add');
        Route::post('/store', [App\Http\Controllers\PesertaController::class, 'store'])->name('peserta-store');
        Route::get('/delete/{id}', [App\Http\Controllers\PesertaController::class, 'destroy'])->name('peserta-delete');
    });

    Route::prefix('user')->group(function () {
        // user
        Route::get('/', [App\Http\Controllers\UserController::class, 'users'])->name('user');
        Route::get('/add', [App\Http\Controllers\UserController::class, 'create'])->name('user-add');
        Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user-store');
        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user-edit');
        Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user-update');
        Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user-delete');
    });
});

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('landingpage.index');
    });
    Route::get('/tentang-kami', function () {
        return view('landingpage.tentang');
    });
    Route::get('/sejarah-kami', function () {
        return view('landingpage.sejarah');
    });
    Route::get('/all-peserta', function () {
        return view('landingpage.peserta');
    });
    Route::post('/use-voucher', [App\Http\Controllers\VoucherController::class, 'useVoucher'])->name('voucher-use');
    Route::get('/voting', [App\Http\Controllers\PesertaController::class, 'landingPage'])->name('voting');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/sdadasd', function () {
    return view('landingpage.peserta');
})->name('laporan-penjualan');
Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::post('/postlogin', [App\Http\Controllers\LoginController::class, 'postlogin'])->name('postlogin');
