<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\AbsenController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\RiwayatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
Route::get('profil', [ProfileController::class, 'index'])->name('profile');
Route::get('absen/{jenis}', [AbsenController::class, 'checkInOutIndex'])->name('checkInOut');
Route::post('absen/{jenis}', [AbsenController::class, 'store'])->name('storeAbsen');
Route::get('absen/{jenis}/sukses', [AbsenController::class, 'absenSukses'])->name('absenSuccess');