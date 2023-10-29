<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnlockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:admin'])->prefix('/admin')->group(function(){
        Route::prefix('/store')->group(function(){
            Route::get('/news', [StoreController::class, 'getAllNews'])->name('admin.stores.news');
            Route::get('/', [StoreController::class, 'getAll'])->name('admin.stores');
            Route::get('/{store}/show', [StoreController::class, 'show'])->name('admin.store.show');
            Route::get('/{store}/validate', [StoreController::class, 'showValidate'])->name('admin.store.validate');
            Route::post('/{store}/validate', [StoreController::class, 'updateStatus'])->name('admin.store.update.status');
            Route::get('/{store}/edit', [StoreController::class, 'edit'])->name('admin.store.edit');
            Route::post('/{store}/update', [StoreController::class, 'update'])->name('admin.store.update');
        });

        Route::prefix('/staff')->group(function(){
            Route::get('/', [StaffController::class, 'getAll'])->name('admin.staffs');
            Route::get('/{id}/show', [StaffController::class, 'show'])->name('admin.staff.show');
            Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('admin.staff.edit');
            Route::post('/{user}/update', [StaffController::class, 'update'])->name('admin.staff.update');
        });

        Route::prefix('/client')->group(function(){
            Route::get('/', [ClientController::class, 'getAll'])->name('admin.clients');
            Route::get('/{client}', [ClientController::class, 'showClient'])->name('admin.client.show');
            Route::post('/{client}/update-status', [ClientController::class, 'updateStatus'])->name('admin.client.update.status');
        });

        Route::prefix('/resquest')->group(function(){
            Route::get('/', [UnlockController::class, 'index'])->name('request.index');
        });

    });

    Route::middleware(['role:staff'])->prefix('/staff')->group(function(){
        Route::get('/products', [ProductController::class, 'index'])->name('staff.products');
        Route::prefix('/product')->group(function(){
            Route::get('/create', [ProductController::class, 'create'])->name('staff.product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('staff.product.store');
            Route::get('/{product}/show', [ProductController::class, 'show'])->name('staff.product.show');
            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('staff.product.edit');
            Route::post('/{product}/update', [ProductController::class, 'update'])->name('staff.product.update');
        });

        Route::prefix('/store')->group(function(){
            Route::get('/', [StoreController::class, 'index'])->name('staff.store');
            Route::get('/create', [StoreController::class, 'create'])->name('staff.store.create');
            Route::post('/', [StoreController::class, 'store'])->name('staff.store.store');
            Route::get('/{store}/edit', [StoreController::class, 'editByStaff'])->name('staff.store.edit');
            Route::post('/{store}/update', [StoreController::class, 'updateByStaff'])->name('staff.store.update');
        });

        Route::get('/sales', [TransactionController::class, 'getSales'])->name('staff.sales');
    });
});

Route::prefix('/data')->group(function(){
    Route::get('/categories', [CategoryController::class, 'getAll']);
    Route::get('/products', [ProductController::class, 'getAll']);
});

Route::get('/product/{product}', [ProductController::class, 'showProduct']);

require_once __DIR__.'/auth.php';
