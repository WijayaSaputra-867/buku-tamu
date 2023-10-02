<?php

use App\Http\Controllers\GuestController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home', [
        'link' => 'home',
    ]);
});

Route::prefix('/guest')->group(function(){
    Route::get('/', [GuestController::class, 'index']);
    Route::get('/details/{guest}', [GuestController::class, 'show']);
    Route::get('/checkout/{guest}', [GuestController::class, 'update']);
});

Route::prefix('/petugas')->group(function() {
    Route::get('/', [UserController::class, 'index']);
});
    