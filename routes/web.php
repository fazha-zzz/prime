<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PembayaranController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Backend\PenggumumanController;



Route::get('/', [App\Http\Controllers\homeController::class, 'index'])->name('home');

Route::prefix('backend')->name('backend.')->group(function () {
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('penggumuman', PenggumumanController::class);
});

