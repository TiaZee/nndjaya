<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\ItemAnalisisController;
use App\Http\Controllers\AccountAnalisisController;

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

    Route::group(['middleware' => ['role:Admin|Owner']], function () {
        // Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
        // Route::get('/order', [OrderController::class, 'index'])->name('order');
        // Route::get('/procurement', [ProcurementController::class, 'index'])->name('procurement');
        // Route to display the list of suppliers
        Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
        // Route to show the form for creating a new supplier
        Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
        // Route to store a newly created supplier
        Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
        // Route to display the form for editing a supplier
        Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
        // Route to update a specific supplier
        Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
        // Route to delete a specific supplier
        Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

        // Route to display the list of items
        Route::get('/items', [ItemController::class, 'index'])->name('items.index');
        // Route to display the form for creating a new item
        Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
        // Route to store a newly created item
        Route::post('/items', [ItemController::class, 'store'])->name('items.store');
        // Route to display the form for editing an item
        Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
        // Route to update an existing item
        Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
        // Route to delete an item
        Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

        Route::get('/restocks', [RestockController::class, 'index'])->name('restocks.index');
        Route::get('/restocks/create', [RestockController::class, 'create'])->name('restocks.create');
        Route::post('/restocks', [RestockController::class, 'store'])->name('restocks.store');
        Route::get('/restocks/{id}/edit', [RestockController::class, 'edit'])->name('restocks.edit');
        Route::put('/restocks/{id}', [RestockController::class, 'update'])->name('restocks.update');
        Route::delete('/restocks/{id}', [RestockController::class, 'destroy'])->name('restocks.destroy');
    });

    Route::group(['middleware' => ['role:Accountant|Owner']], function () {
        Route::get('/account-analisis', [AccountAnalisisController::class, 'index'])->name('acc-analisis.index');
        Route::get('/item-analisis', [ItemAnalisisController::class, 'index'])->name('item-analisis.index');
    });

    Route::group(['middleware' => ['role:Owner']], function () {
        Route::get('/create-user', [CreateUserController::class, 'index'])->name('create-user');
        Route::post('/create-user', [CreateUserController::class, 'store'])->name('create.post');
    });
});

require __DIR__ . '/auth.php';
