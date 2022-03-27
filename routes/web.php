<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TipeKamarController;

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

Route::get('/', [ClientController::class, 'index'])->name('home');
Route::get('/kamar/pesan', [ClientController::class, 'showReservationForm']);
Route::post('/kamar/pesan', [ClientController::class, 'reservation']);

Route::get('tipe/{id}', [ClientController::class, 'tipe']);

Route::get('/reservasi/{reservasi}/receipt', [ClientController::class, 'printReceipt']);

Route::middleware(['auth'])->group(function () {
    Route::get('admin/logout', [AuthController::class, 'logout']);
    Route::get('admin/dashboard', [KamarController::class, 'index'])->name('admin.dashboard');

    Route::resource('/admin/kamar', KamarController::class);
    route::resource('/admin/tipe-kamar', TipeKamarController::class);
    
    Route::get('resepsionis/dashboard', [ReservasiController::class, 'index'])->name('resepsionis.dashboard');
    
    Route::get('/resepsionis/reservasi', [ReservasiController::class, 'index']);
    Route::post('resepsionis/reservasi', [ReservasiController::class, 'proses']);
    // Route::get('/admin/reservasi/{reservasi}', [ReservasiController::class, 'detail']);
});

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);