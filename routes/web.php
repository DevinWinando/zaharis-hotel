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

Route::get('/reservasi/{reservasi}/receipt', [ClientController::class, 'printReceipt']);

Route::middleware(['auth'])->group(function () {
    Route::get('admin/logout', [AuthController::class, 'logout']);
    Route::get('admin/dashboard', [KamarController::class, 'index'])->name('dashboard');

    Route::resource('/admin/kamar', KamarController::class);

    route::resource('/admin/tipe-kamar', TipeKamarController::class);

    Route::get('/admin/reservasi', [ReservasiController::class, 'index']);
    Route::get('/admin/reservasi/{reservasi}', [ReservasiController::class, 'detail']);
});

Route::get('admin/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('admin', [AuthController::class, 'showFormLogin']);
Route::post('admin', [AuthController::class, 'login']);
Route::post('admin/login', [AuthController::class, 'login']);