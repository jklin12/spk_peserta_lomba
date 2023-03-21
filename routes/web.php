<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerangkinganController;
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
    return view('pages.login');
})->name('login');

Route::post('/doLogin', [AuthenticateController::class, 'doLogin'])->name('doLogin');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class,'index'])->name('home');
    Route::get('/logout', [AuthenticateController::class,'doLogout'])->name('logout');

    Route::resource('anggota', AnggotaController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('alternative', AlternativeController::class);
    Route::resource('perangkingan', PerangkinganController::class);
});
