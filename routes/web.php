<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

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

// Route untuk halaman root, yang mengarah ke login
Route::get('/', function () {
    return redirect()->route('login'); // Redirect langsung ke halaman login
});

// Route login dan register
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route untuk bookings
Route::resource('bookings', BookingController::class);
Route::get('/bookings/view/pdf', [BookingController::class, 'view_pdf']);
Route::get('/bookings/download/pdf', [BookingController::class, 'download_pdf']);