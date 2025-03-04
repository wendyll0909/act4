<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

// Include Breeze's auth routes
require __DIR__.'/auth.php';

// Root route: redirect to menu if authenticated, login if not
Route::get('/', function () {
    return auth()->check() ? redirect()->route('menu.index') : redirect()->route('login');
});

// Menu routes (protected by auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});