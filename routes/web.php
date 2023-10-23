<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UnlockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function(){
        return view('admin.index');
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
});

require_once __DIR__.'/auth.php';
