<?php

use App\Http\Controllers\admin\DataAbsensiController;
use App\Http\Controllers\admin\DataGuruController;
use App\Http\Controllers\admin\DataLokasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\AbsenController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\IzinController;
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
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('login', [AuthController::class, 'doLogin'])->name('doLogin');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware(['user'])->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('profil', [ProfileController::class, 'index'])->name('profile');
        Route::get('edit-profile', [ProfileController::class, 'update'])->name('update-profile');
        Route::post('edit-profile', [ProfileController::class, 'goUpdate'])->name('go-update-profile');

        Route::get('absen/{jenis}', [AbsenController::class, 'checkInOutIndex'])->name('checkInOut');
        Route::post('absen/{jenis}', [AbsenController::class, 'store'])->name('storeAbsen');
        Route::get('absen/{jenis}/sukses', [AbsenController::class, 'absenSukses'])->name('absenSuccess');
        Route::post('submit_izin', [IzinController::class, 'store']);
        Route::get('izin/sukses', [IzinController::class, 'successIndex'])->name('izin_success');

        Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
        Route::post('riwayat', [RiwayatController::class, 'index'])->name('get-riwayat');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name('dashboard');
        Route::get('data-guru', [DataGuruController::class, 'index'])->name('data-guru');
        Route::get('data-guru/{id}', [DataGuruController::class, 'detailGuru'])->name('detail-guru');
        Route::post('update-guru', [DataGuruController::class, 'updateGuru'])->name('update-guru');
        Route::get('tambah-guru', [DataGuruController::class, 'tambahGuru'])->name('tambah-guru');
        Route::post('tambah-guru', [DataGuruController::class, 'storeTambahGuru'])->name('tambah-guru');
        Route::post('delete-guru', [DataGuruController::class, 'delete'])->name('guru.delete');

        Route::get('data-absensi', [DataAbsensiController::class, 'index'])->name('data-absensi');

        Route::get('data-lokasi', [DataLokasiController::class, 'index'])->name('data.lokasi');
        Route::post('tambah-lokasi', [DataLokasiController::class, 'store'])->name('add.location');
    });
});