<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    public function index(){
        $items = session()->get('cart') ?? [];
        if(count($items)==0){
            return redirect()->route('shop');
        }
        return view('Zay.checkout' , compact('items'));
    }






    public function store(Request $request){

        $items = session()->get('cart') ?? [];

        if(!auth()->check()){
            return redirect()->route('shop');
        }

        if(count($items)==0){
            return redirect()->route('shop');
        }

        DB::beginTransaction();
try{

    $productsCount=0;
    $total = 0 ;

    foreach($items as $item){
        $productsCount += $item['quantity'];
        $total += $item['quantity'] *$item['price'];
    }
            $data = $request->validate([
                'name'=>'required|string',
                'email'=>'required|email',
                'phone'=>'required|string',
                'city'=>'required|string',
                'address'=>'required|string',
                'postal_code'=>'nullable|string',
                'more_info'=>'nullable|string',
                'payment_method'=>'required|in:cash','payment',

            ]);
            //create order
            $order = Order::create([
    'user_id'=> auth()->user()->id,
    'products_count'=>$productsCount,
    'total'=>$total,
    'payment_method'=> $data['payment_method'],
    'name'=>$data['name'],
    'email'=>$data['email'],
    'phone'=>$data['phone'],
    'city'=>$data['city'],
    'address'=>$data['address'],
    'postal_code'=>$data['postal_code'],
    'more_info'=>$data['more_info'],

            ]);

            //create order items
    foreach($items as $item){
    $order->items()->create([
    'product_id'=>$item['id'],
    'quantity'=>$item['quantity'],
    'unit_price'=>$item['price'],
    'total'=>$item['quantity']*$item['price'],
                ]);


    }

            session()->forget('cart');
            DB::commit();
     return redirect()->route('home.index');
}catch(\Exception $e){
    DDB::rollback();
    return redirect()->back();

}

    }
}
