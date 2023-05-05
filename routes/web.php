<?php

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
    Route::get('dashboard', [DashboardController::class,'index'])->name('Dashboard');
    Route::post('logout', [AuthenticateController::class,'logout'])->name('logout');

    Route::get('/profile',[ProfileCOn::class, 'profile'])->name('user.profile');
    Route::post('/profile/update',[DashboardController::class, 'update'])->name('user.profile.update');

    Route::resource('users', UserController::class);
    Route::resource('slots', SlotController::class);
});
