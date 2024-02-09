<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function checkout() {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if (count($carts) == 0) {
            session()->flash('message', 'Cart kosong');
            return Redirect::back();
            
        } else {
            $order = Order::create([
                'user_id' => $user_id,
            ]);
    
            foreach ($carts as $cart) {
                Product::find($cart->product_id)->decrement('stock', $cart->amount);

                Transaction::create([
                    'amount' => $cart->amount,
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id
                ]);
                $cart->delete();
            }
            
            
            session()->flash('message', 'Order sedang diproses');
            return Redirect::back();
        }        
    }

    public function index_order() {
        $orders = Order::all();
        return view('index_order', compact('orders'));
    }

    public function show_order(Order $order) {        
        return view('show_order', compact('order'));
    }

    public function submit_payment_receipt(Order $order, Request $request) {
  
        $file = $request->file('payment_receipt');
        $path = time() . "_" . $order->id . "." . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/order/' . $path, file_get_contents($file));

        $order->update([
           'payment_receipt' => $path
        ]);
        return Redirect::back();
    }

    public function confirm_payment(Order $order) {        
        if ($order->is_paid) {
            $order->update([
                'is_paid' => false
            ]);
    
            return Redirect::back();
        } else {
            $order->update([
                'is_paid' => true
            ]);
    
            return Redirect::back();
        }
        
    }
}
