<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\orders;

class OrdersController extends Controller
{

    public function show()
    {
        $orders = orders::all(); 

        return view('./Admin/orders',compact('orders'));
    }
    
    public function show_details($id){
        
        $order = orders::findOrFail($id);
        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $orderDetail) {
            $orderDetail->product_name = $orderDetail->product->product_name;
            $orderDetail->image = $orderDetail->product->images->first();
        }
        return view('./Admin/detail_order', compact('order','orderDetails'));
    }

    public function delete($id)
    {
        $order = orders::find($id);
        
        // Storage::delete('public/image/nhanvien/' . $product->img_link);

        $order->delete();

        return redirect()-> action([OrdersController::class,'show'])->with('success','Dữ liệu xóa thành công.');
    }

    public function updateStatus($id)
{
    $order = orders::findOrFail($id);
    $order->update(['status' => 1]);


    return redirect()->back()->with('success', 'Trạng thái đã được cập nhật thành công.');
}
}
