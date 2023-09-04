<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inputKlubController;
use App\Http\Controllers\inputSkorController;
use App\Http\Controllers\klasemenController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route untuk menampilkan halaman input klub
Route::get('/', [inputKlubController::class, 'index'])->name('inputKlub');


// Route untuk menampilkan halaman input skor
Route::get('/input-skor', [inputSkorController::class, 'index'])->name('inputSkor');


// Route untuk menampilkan halaman input skor
Route::get('/klasemen', [klasemenController::class, 'index'])->name('klasemen');


