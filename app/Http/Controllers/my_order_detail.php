<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders_detail;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

class my_order_detail extends Controller
{
    public function create($id)
    {
        $user = Auth::user();
        $orders_detail = orders_detail::where('orders_id',$id)->get();
        foreach ($orders_detail as $orderDetail) {
            $product = product::find($orderDetail->product_id);
            $orderDetail->product_name = $product->product_name;
        }
        return view('/User/my_order_detail', compact('orders_detail','user'));

    }
}
