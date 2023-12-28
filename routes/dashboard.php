<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;

// ===============================dashboard routs =============================

Route::prefix('dashboardPanel')->middleware(['auth','checkAdmin'])->name('dashboard.')->group(function(){

    Route::get ('/',[DashboardController::class,'index'] )->name('index');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);


});














    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


?>
