<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'isadmin'])->get('/admin', function () {
    return 'HALAMAN ADMIN';
});

Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::resource('/admin/categories', CategoryController::class);
});

Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::resource('/admin/products', ProductController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/shop', [TransactionController::class, 'index']);
    Route::post('/checkout', [TransactionController::class, 'store']);
});

Route::middleware(['auth', 'isadmin'])->get('/admin/statistics', [StatisticController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/my-transactions', [TransactionController::class, 'myTransactions']);
    Route::get('/my-transactions/{id}', [TransactionController::class, 'detail']);
});

Route::middleware(['auth','isadmin'])->get('/admin/dashboard', [AdminDashboardController::class,'index']);

require __DIR__ . '/auth.php';
