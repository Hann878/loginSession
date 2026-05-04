<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// login & register
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'process']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::get('/logout', [AuthController::class, 'logout']);

// protected
Route::middleware(['auth.session'])->group(function () {

    Route::get('/dashboard', function () {
        return "Dashboard Rumah Sakit";
    });

    Route::middleware(['role:dokter'])->group(function () {
        Route::get('/data-pasien', function () {
            return "Data pasien (dokter)";
        });
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/data-dokter', function () {
            return "Kelola dokter (admin)";
        });
    });

    Route::middleware(['role:pasien'])->group(function () {
        Route::get('/riwayat', function () {
            return "Riwayat pasien";
        });
    });

});