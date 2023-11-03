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