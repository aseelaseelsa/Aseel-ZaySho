<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index(){
        if (!auth()->check()){
            return redirect()->route('home');
        }

        $cartItems= session()->get('cart')??[];
        return view('Zay.cart',compact('cartItems'));
    }

    public function addToCartSession($id){
if (!auth()->check()){
    return redirect()->route('home');
}

$product=Product::find($id);
if(!$product){
    return redirect()->route('home.index');
}

$cart = session()->get('cart')??[];

if (array_key_exists($product->id, $cart)) {
    $cart[$product->id]['quantity']++;
} else {
    $cart[$product->id] = [
        'id' => $product->id,
        'title' => $product->title,
        'price' => $product->discount_price ?? $product->price,
        'quantity' => 0,
        'image' => $product->image,
    ];
    $cart[$product->id]['quantity']++;
}
session()->put('cart', $cart);
Log::info(session()->get('cart'));
return redirect()->back();
    }

}
