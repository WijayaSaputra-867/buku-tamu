<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index']);

Route::prefix('/guest')->group(function(){
    Route::get('/', [GuestController::class, 'index']);
    Route::post('/create', [GuestController::class, 'store']);
    Route::get('/details/{guest}', [GuestController::class, 'show']);
    Route::get('/checkout/{guest}', [GuestController::class, 'update']);
});

Route::prefix('/petugas')->group(function() {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/create', [UserController::class, 'store']);
    Route::get('/details/{user}', [UserController::class, 'show']);
    Route::post('/update/{user}', [UserController::class, 'update']);
});
    
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
