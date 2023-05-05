<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::post('logout', [AuthenticateController::class,'logout'])->name('logout');

    Route::get('/profile',[ProfileController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update',[DashboardController::class, 'update'])->name('user.profile.update');

    Route::resource('users', UserController::class);
    Route::resource('items', ItemController::class);
});
