<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Auth::routes();
Route::get('/', [HomeController::class, 'map'])->name('map');
Route::get('/GetInfo/{id}', [HomeController::class, 'showinfo'])->name('showinfo');
Route::post('/GetRooms', [HomeController::class, 'getRooms']);

Route::middleware(['auth'])->group(function () {
    Route::get('/Admin/Dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/Admin/Edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::get('/get-room-info/{id}', [AdminController::class, 'getRoomInfo']);

    Route::get('/Profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/All-floors', [AdminController::class, 'allfloors'])->name('allfloors');
    Route::get('/Lower-ground', [AdminController::class, 'lowerGround'])->name('lower-ground');
    Route::get('/Ground-floor', [AdminController::class, 'groundFloor'])->name('ground-floor');
    Route::get('/Second-floor', [AdminController::class, 'secondFloor'])->name('second-floor');
    Route::get('/Third-floor', [AdminController::class, 'thirdFloor'])->name('third-floor');
    Route::get('/Fourth-floor', [AdminController::class, 'fourthFloor'])->name('fourth-floor');

    Route::post('/Admin/Profile/Update', [AdminController::class, 'updateprofile'])->name('updateprofile');
    Route::post('/Admin/Edit/Submit', [AdminController::class, 'submitedit'])->name('submitedit');
    Route::post('/Admin/Enable', [AdminController::class, 'enable'])->name('enable');
    Route::post('/Admin/Disable', [AdminController::class, 'disable'])->name('disable');
    Route::post('/Admin/Room/Swaps', [AdminController::class, 'swapRooms'])->name('swapRooms');
});
