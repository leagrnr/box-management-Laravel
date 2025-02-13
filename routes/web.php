<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoxController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/boxes', [BoxController::class, 'index'])->name('boxes.index');
    Route::get('/boxes/create', [BoxController::class, 'create'])->name('boxes.create');
    Route::get('/boxes/{id}', [BoxController::class, 'show'])->name('boxes.show');
    Route::post('/boxes', [BoxController::class, 'store'])->name('boxes.store');
    Route::get('/boxes/{id}/edit', [BoxController::class, 'edit'])->name('boxes.edit');
    Route::put('/boxes/{id}/update', [BoxController::class, 'update'])->name('boxes.update');
    Route::delete('/boxes/{id}', [BoxController::class, 'destroy'])->name('boxes.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
