<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GantiPassword;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/arsip/add', [ArsipController::class, 'create'])->name('arsip.create');
    Route::post('/arsip/store', [ArsipController::class, 'store'])->name('arsip.store');
    Route::get('/arsip/show/{hashId}', [ArsipController::class, 'show'])->name('arsip.show');
    Route::get('/arsip/{hashId}/edit', [ArsipController::class, 'edit'])->name('arsip.edit');
    Route::put('/arsip/{hashId}', [ArsipController::class, 'update'])->name('arsip.update');
    Route::delete('/arsip/{arsip}', [ArsipController::class, 'destroy'])->name('arsip.destroy');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/add', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{hashId}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{hashId}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/add', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/password', [UserController::class, 'password'])->name('user.password');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{hashId}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{hashId}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    
    Route::get('/password/{hashId}/editPassword', [GantiPassword::class, 'editPassword'])->name('password.editPassword');
    Route::put('/password/{hashId}', [GantiPassword::class, 'updatePassword'])->name('password.updatePassword');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
