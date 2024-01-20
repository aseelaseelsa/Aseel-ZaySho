<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Models\Order;





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






Route::controller(ShopeController::class)->group(function(){
Route::get ('/home', 'index' )->name('home.index');
Route::get ('/about','about' )->name('about');
Route::get ('/contact', 'contact' )->name('contact');
Route::get ('/shop', 'shop' )->name('shop');
Route::get ('/shopSingle/{id}', 'shopSingle' )->name('shopSingle');
Route::get ('/order','order')->name('order');


});

Route::controller(CartController::class)->prefix('cart')->name('cart.')->middleware('auth')->group(function(){
Route::get('/','index')->name('index');
Route::get('/add/{id}','addToCartSession')->name('addToSession');



});


Route::controller(CheckoutController::class)->prefix('checkout')->name('checkout.')->middleware('auth')->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/','store')->name('store');



});
require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
