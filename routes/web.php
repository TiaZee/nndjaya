<?php

use App\Http\Controllers\AccountAnalisisController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemAnalisisController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::group(['middleware' => ['role:Sales|Admin']], function() {
        Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
        Route::get('/order', [OrderController::class, 'index'])->name('order');
        Route::get('/procurement', [ProcurementController::class, 'index'])->name('procurement');
    });
    Route::group(['middleware' => ['role:Accountant|Admin']], function() {
        Route::get('/account-analisis', [AccountAnalisisController::class, 'index'])->name('acc-analisis.index');
        Route::get('/item-analisis', [ItemAnalisisController::class, 'index'])->name('item-analisis.index');
    });
    Route::group(['middleware' => ['role:Admin']], function() {
        Route::get('/create-user', [CreateUserController::class, 'index'])->name('create-user');
        Route::post('/create-user', [CreateUserController::class, 'store'])->name('create.post');
    });
});

require __DIR__.'/auth.php';
