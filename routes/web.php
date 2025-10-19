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

    // Store Data
    Route::post('user/store', [UserController::class, 'store'])->name('userStore');

    // User Edit
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');

    // User Update/Edit
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
    
    // User Hapus Destroy
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');

    // Minusan
    Route::get('minusan', [MinusanController::class, 'index'])->name('minusan');

    // Excel
    Route::get('user/excel', [UserController::class, 'excel'])->name('userExcel');

    // PDF
    Route::get('user/pdf', [UserController::class, 'pdf'])->name('userPdf');
    
});


