<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\ItemAnalisisController;
use App\Http\Controllers\AccountAnalisisController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;


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

     // Route to display the report form
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');

    Route::group(['middleware' => ['role:Admin|Owner']], function () {
        // Route to display the list of suppliers
        Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
        Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
        Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
        Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
        Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
        Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

        // Route to display the list of items
        Route::get('/items', [ItemController::class, 'index'])->name('items.index');
        Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('/items', [ItemController::class, 'store'])->name('items.store');
        Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
        Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
        Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

        // Route to display the Restock form
        Route::get('/restocks', [RestockController::class, 'index'])->name('restocks.index');
        Route::get('/restocks/create', [RestockController::class, 'create'])->name('restocks.create');
        Route::post('/restocks', [RestockController::class, 'store'])->name('restocks.store');
        Route::get('/restocks/{id}/edit', [RestockController::class, 'edit'])->name('restocks.edit');
        Route::put('/restocks/{id}', [RestockController::class, 'update'])->name('restocks.update');
        Route::delete('/restocks/{id}', [RestockController::class, 'destroy'])->name('restocks.destroy');

        // Route to display the sales form
        Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
        Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create');
        Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
        Route::get('/sales/{id}/edit', [SalesController::class, 'edit'])->name('sales.edit');
        Route::put('/sales/{id}', [SalesController::class, 'update'])->name('sales.update');
        Route::delete('/sales/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');
    });

    Route::group(['middleware' => ['role:Accountant|Owner']], function () {
        Route::get('/account-analisis', [AccountAnalisisController::class, 'index'])->name('acc-analisis.index');
        Route::get('/item-analisis', [ItemAnalisisController::class, 'index'])->name('item-analisis.index');
    });

    Route::group(['middleware' => ['role:Owner']], function () {
        Route::get('/create-user', [CreateUserController::class, 'home'])->name('create-user.home');
        Route::get('/create-user/create', [CreateUserController::class, 'index'])->name('create-user');
        Route::post('/create-user/create', [CreateUserController::class, 'store'])->name('create.post');
    });
});

require __DIR__ . '/auth.php';
