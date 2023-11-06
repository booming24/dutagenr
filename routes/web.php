<?php

use App\Http\Controllers\PesertaController;
use App\Http\Controllers\VoucherController;
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

Route::prefix('backend')->group(function () {
    Route::controller(PesertaController::class)->group(function () {
        Route::get('/peserta/landing_page', 'landingPage')->name("peserta_landing");
        Route::get('/peserta/admin', 'adminPanel')->name("peserta_admin");
        Route::get('/laporan-kandidat', 'laporanpeserta')->name("laporanpeserta_admin");
        Route::get('/peserta/create', function () {
            return view('backend.master.peserta.create');
        });
        Route::post('/peserta', 'store')->name("create_peserta");
        Route::get('/peserta/admin/{$id}', 'destroy')->name("delete_peserta");
    });
    Route::controller(VoucherController::class)->group(function () {
        Route::get('/voucher', 'index')->name("voucher");
        Route::post('/voucher', 'store')->name("create_voucher");
        Route::get('/voucher/{$id}', 'destroy')->name("delete_voucher");
    });
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('frontend.landingpage');
});

Route::get('/tentang-kami', function () {
    return view('frontend.tentang');
});

Route::get('/sejarah-kami', function () {
    return view('frontend.sejarah');
});

Route::get('/peserta', function () {
    return view('frontend.peserta');
});


Route::get('/voting', function () {
    return view('frontend.voting');
});


Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('backend.dashboardadmindugen');
});

Route::get('/sidebar', function () {
    return view('backend.sidebar');
});

Route::get('/admin', function () {
    return view('backend.dashboard');
});

Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::post('/postlogin', [App\Http\Controllers\LoginController::class, 'postlogin'])->name('postlogin');