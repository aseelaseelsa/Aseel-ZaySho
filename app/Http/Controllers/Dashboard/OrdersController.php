<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrdersController extends Controller
{
    public function index($status='new'){

     if(!in_array($status, ['new', 'approved', 'paid', 'unpaid', 'completed','rejected'])){
return redirect()->back()->with('error','Invalid route');
     }


        if ($status== 'new'){
        $orders = Order::where('status','pending')->where('delivery_status','undelivered')->get();

        }

        if ($status== 'approved'){
            $orders = Order::where('status','accepted')->where('delivery_status','undelivered')->get();

            }
            if ($status== 'paid'){
                $orders = Order::where('status','accepted')->where('delivery_status','undelivered')->where('payment_status','paid')->get();

                }
                if ($status== 'unpaid'){
                    $orders = Order::where('payment_status','unpaid')->where('delivery_status','delivered')->get();

                    }
                if ($status== 'completed'){
                    $orders = Order::where('status','accepted')->where('delivery_status','delivered')->where('payment_status','paid')->get();

                    }
                    if ($status== 'rejected'){
                        $orders = Order::where('status','rejected')->get();

                        }
        return view('dashboard.orders.index',compact('orders','status'));
    }






    public function show($order){
        $order=Order::with(['items'])->find($order);
        if(!$order){
            return redirect()->back()->with('error', 'Invoice not found');
        }
        return view('dashboard.orders.show',compact('order'));

    }


    public function changeStatus($order,$status){
        $order=Order::find($order);
        if(!$order){
            return redirect()->back()->with('error', 'Order not found');
        }

        if(!in_array($status, [ 'accepted','rejected'])){
            return redirect()->back()->with('error','Invalid route');
                 }

                $order->update([
                    'status'=>$status
                ]);
                 return redirect()->back()->with('success','Order status change successfully');



    }


    public function changePaymentStatus($order,$status){
        $order=Order::find($order);
        if(!$order){
            return redirect()->back()->with('error', 'Order not found');
        }
        if(!in_array($status, [ 'paid','unpaid'])){
            return redirect()->back()->with('error','Invalid route');
                 }

                $order->update([
                    'payment_status'=>$status
                ]);
                 return redirect()->back()->with('success','Order payment status change successfully');


    }



       public function changeDeliveryStatus($order,$status){
        $order=Order::find($order);
        if(!$order){
            return redirect()->back()->with('error', 'Order not found');
        }
        if(!in_array($status, [ 'delivered','undelivered'])){
            return redirect()->back()->with('error','Invalid route');
                 }

                $order->update([
                    'delivery_status'=>$status
                ]);
                 return redirect()->back()->with('success','Order payment status change successfully');


    }
}
