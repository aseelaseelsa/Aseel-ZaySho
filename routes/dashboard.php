<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\OrdersController;


// ===============================dashboard routs =============================

Route::prefix('dashboardPanel')->middleware(['auth','checkAdmin'])->name('dashboard.')->group(function(){

    Route::get ('/',[DashboardController::class,'index'] )->name('index');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
    Route::get('orders/{status?}',[OrdersController::class,'index'])->name('orders.index');
    Route::get('orders/{order}/show',[OrdersController::class,'show'])->name('orders.show');
    Route::get('orders/{order}/status/{status}',[OrdersController::class,'changeStatus'])->name('orders.status');
    Route::get('orders/{order}/delivery/{status}',[OrdersController::class,'changeDeliveryStatus'])->name('orders.delivery_status');
    Route::get('orders/{order}payment/{status}',[OrdersController::class,'changePaymentStatus'])->name('orders.payment_status');


});


















    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


?>
