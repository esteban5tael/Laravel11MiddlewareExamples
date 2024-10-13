<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', _SiteController::class)->name('index');


/* Ejemplo de Uso de Rutas Admin */
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', AdminController::class)->name('admin.index');
});
/* Ejemplo de Uso de Rutas Admin */

/* Ejemplo de Uso de Rutas Usuario */
Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/', UserController::class)->name('user.index');
});
/* Ejemplo de Uso de Rutas Usuario */

/* Ejemplo de Uso de Rutas Invitado */
Route::prefix('guests')->middleware(['auth', 'guests'])->group(function () {
    Route::get('/', GuestController::class)->name('guests.index');
});
/* Ejemplo de Uso de Rutas Invitado */

Route::get('/errors/forbiden', [_SiteController::class,'forbiden'])->name('error.forbiden');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [_SiteController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
