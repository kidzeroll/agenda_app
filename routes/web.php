<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('password', [AuthController::class, 'edit'])->name('password.edit');
    Route::patch('password', [AuthController::class, 'update'])->name('password.update');

    //agenda
    Route::resource('agenda', AgendaController::class);

    //pegawai
    Route::resource('pegawai', PegawaiController::class);
});
