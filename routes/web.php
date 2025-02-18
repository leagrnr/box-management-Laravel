<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ContractModelController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

//    BOXES
    Route::get('/boxes', [BoxController::class, 'index'])->name('boxes.index');
    Route::get('/boxes/create', [BoxController::class, 'create'])->name('boxes.create');
    Route::get('/boxes/{id}', [BoxController::class, 'show'])->name('boxes.show');
    Route::post('/boxes', [BoxController::class, 'store'])->name('boxes.store');
    Route::get('/boxes/{id}/edit', [BoxController::class, 'edit'])->name('boxes.edit');
    Route::put('/boxes/{id}/update', [BoxController::class, 'update'])->name('boxes.update');
    Route::delete('/boxes/{id}', [BoxController::class, 'destroy'])->name('boxes.destroy');

//    TENANTS
    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::get('/tenants/{id}', [TenantController::class, 'show'])->name('tenants.show');
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('/tenants/{id}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::put('/tenants/{id}/update', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('/tenants/{id}', [TenantController::class, 'destroy'])->name('tenants.destroy');

// CONTRACTS MODEL
    Route::get('/contracts_model', [ContractModelController::class, 'index'])->name('contracts_model.index');
    Route::get('/contracts_model/create', [ContractModelController::class, 'create'])->name('contracts_model.create');
    Route::get('/contracts_model/{id}', [ContractModelController::class, 'show'])->name('contracts_model.show');
    Route::post('/contracts_model', [ContractModelController::class, 'store'])->name('contracts_model.store');
    Route::get('/contracts_model/{id}/edit', [ContractModelController::class, 'edit'])->name('contracts_model.edit');
    Route::put('/contracts_model/{id}/update', [ContractModelController::class, 'update'])->name('contracts_model.update');
    Route::delete('/contracts_model/{id}', [ContractModelController::class, 'destroy'])->name('contracts_model.destroy');

// CONTRACTS
    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');
    Route::get('/contracts/{id}', [ContractController::class, 'show'])->name('contracts.show');
    Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('/contracts/{id}/edit', [ContractController::class, 'edit'])->name('contracts.edit');
    Route::put('/contracts/{id}/update', [ContractController::class, 'update'])->name('contracts.update');
    Route::delete('/contracts/{id}', [ContractController::class, 'destroy'])->name('contracts.destroy');

// BILLS
    Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
    Route::post('/bills', [BillController::class, 'store'])->name('bills.store');
    Route::put('/bills/{id}/update', [BillController::class, 'update'])->name('bills.update');

// PAYMENT

    Route::get('/payment', [PaymentController::class, 'index'])->name('payments.index');
    Route::put('/payment/{billId}', [PaymentController::class, 'update'])->name('payments.update');


//    PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
