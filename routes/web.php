<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBookRecordsController;
use Illuminate\Support\Facades\Route;

require("train.php");
require("train_admin.php");

Route::get('/dashboard', [UserBookRecordsController::class, "userBook"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
