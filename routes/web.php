<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\Tiketcontroller;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\wisatacontroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\JadwalController;




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

Route::get('/index', function () {
    return view('index');
});

// LOGIN DAN REGISTER
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'handle']);

Route::get('/register', [RegisterController::class, 'showRegister']);
Route::post('/register', [RegisterController::class, 'handleRegister'])->name('register.handle');

// ROUTE ADMIN DAN USER
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

// ROUTE DATA WISATA ADMIN
Route::get('/admin/wisata', [wisatacontroller::class, 'wisata'])->name('admin.wisata');
Route::get('/admin/create', [wisatacontroller::class, 'create']);
Route::delete('/admin/delete/{id}', [wisatacontroller::class, 'destroy']);
// Tambahkan route untuk update
Route::patch('/admin/wisata/update/{id}', [wisatacontroller::class, 'update'])->name('admin.wisata.update');


// TAMBAH WISATA
Route::post('/admin/tambah', [wisatacontroller::class, 'store'])->name('tambah');

// ROUTE DATA WISATA USER
Route::get('/user/wisata', [wisatacontroller::class, 'userWisata'])->name('user.wisata');

// ROUTE PEMESANAN
Route::get('/user/pesan/{id}', [PemesananController::class, 'pesan'])->name('user.pesan');
Route::post('/user/pesan/{id}', [PemesananController::class, 'pesanWisata'])->name('pesan.wisata');

// DETAIL WISATA
Route::get('/user/detail/{id}', [PemesananController::class, 'showDetail'])->name('user.detail');

// ROUTE PEMESANAN TIKET
Route::get('/admin/data', [PemesananController::class, 'createPemesanan'])->name('admin.data');
// FORM PEMESANAN
Route::post('/user/data', [PemesananController::class, 'pesanWisata'])->name('user.pemesan');

// PAGE ULASAN
Route::get('/user/ulasan/{id}', [UlasanController::class, 'create'])->name('user.ulasan.create');
Route::post('/user/ulasan/komentar/{id}', [UlasanController::class, 'store'])->name('user.ulasan.store');

// JADWAL WISATA
Route::post('/admin/jadwal/store', [JadwalController::class, 'jadwal'])->name('admin.jadwal.store');
Route::get('/user/jadwal', [JadwalController::class, 'showJadwal'])->name('user.jadwal');
