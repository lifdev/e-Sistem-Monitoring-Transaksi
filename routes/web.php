<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MinusanController;
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

// Login
Route::redirect('/', '/login');
Route::get('login', [AuthController::class, 'login'])->name('login');

// Login Proses
Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');

// Logout
Route::get('logout',[AuthController::class, 'logout'])->name('logout');

Route::middleware('checkLogin')->group(function(){
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User
    Route::get('user', [UserController::class, 'index'])->name('user');

    // User Create
    Route::get('user/create', [UserController::class, 'create'])->name('userCreate');

    // Store Data User
    Route::post('user/store', [UserController::class, 'store'])->name('userStore');

    // User Edit
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');

    // User Update
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
    
    // User Hapus Destroy
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');

    // Minusan
    Route::get('minusan', [MinusanController::class, 'index'])->name('minusan');

    // User Excel
    Route::get('user/excel', [UserController::class, 'excel'])->name('userExcel');

    // User PDF
    Route::get('user/pdf', [UserController::class, 'pdf'])->name('userPdf');

    // Create Minusan
    Route::get('minusan/create', [MinusanController::class, 'create'])->name('minusanCreate');

    // Store Data Minusan
    Route::post('minusan/store', [MinusanController::class, 'store'])->name('minusanStore');

    // Minusan Edit
    Route::get('minusan/edit{id}', [MinusanController::class, 'edit'])->name('minusanEdit');

    // Minusan Update
    Route::post('minusan/update{id}', [MinusanController::class, 'update'])->name('minusanUpdate');

    // Minusan Hapus Destroy
    Route::delete('minusan/destroy{id}', [MinusanController::class, 'destroy'])->name('minusanDestroy');

    // Minusan Excel
    Route::get('minusan/excel', [MinusanController::class, 'excel'])->name('minusanExcel');

    // Minusan PDF
    Route::get('minusan/pdf', [MinusanController::class, 'pdf'])->name('minusanPdf');
});


