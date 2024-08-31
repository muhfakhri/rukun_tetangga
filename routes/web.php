<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Auth;

Route::resource('warga', WargaController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
