<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Auth::routes();
Route::get('/', function () {
    return view('map');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/Admin/Dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/Admin/Edit/{id}', [AdminController::class, 'edit'])->name('edit');
});
