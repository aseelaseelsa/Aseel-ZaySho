<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Front\FrontController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(FrontController::class)->group(function(){
    Route::get ('/','index')->name('homepage');

});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');









Route::get ('home',[ShopeController::class , 'index'] )->name('home.index');
Route::get ('about',[ShopeController::class , 'about'] )->name('about');
Route::get ('contact',[ShopeController::class , 'contact'] )->name('contact');
Route::get ('shop',[ShopeController::class , 'shop'] )->name('shop');
Route::get ('shopDetails',[ShopeController::class , 'shopSingle'] )->name('shopSingle');




require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
