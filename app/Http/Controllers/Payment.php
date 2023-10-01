<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\orders;
use App\Models\orders_detail;


class Payment extends Controller
{
    public function Payment(){
        $cartItems = \Cart::getContent();
        $user = Auth::user();

        return view('/User/payment', compact('cartItems','user'));
    }

    public function Add(Request $request){
        $orders = new orders;
        $user = Auth::user();
        $orders->fullname = $request->name;
        $orders->email = $request->email;
        $orders->user_id = $user->id;
        $orders->address = $request->address;
        $orders->phone = $request->phone;
        $orders->total_pay = $request->total_pay;
        $orders->save();

        $cartItems = \Cart::getContent();
        foreach ($cartItems as $item) {
            $orderDetail = new orders_detail;
            $orderDetail->orders_id = $orders->id; 
            $orderDetail->product_id = $item->id; 
            $orderDetail->quantity = $item->quantity; 
            $orderDetail->price = $item->price;
            $orderDetail->total_price = $item->price * $item->quantity;
            $orderDetail->save();
    }

    \Cart::clear();


        return redirect()->route('user.home_page');
        
    }
}
