<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;  
use App\Models\User;

class ManageOrderController extends Controller
{
    // public function index()
    // {
    //     $orders = Orders::with('user')->get(); 
    //     return view('manage_order.index', compact('orders'));
    // }
    
    public function index()
    {
        // $orderDetails = OrderDetails::all();
        $orderDetails = OrderDetails::with('order.user')->get();  
        // dd($orderDetails);
        return view('manage_order.index', compact('orderDetails'));
    }
    
    public function show($orderId)
    {
        $order = Orders::with('order_details.package')->findOrFail($orderId);
        return view('manage_order.show', compact('order'));
    }

    // public function updateStatus(Request $request, $orderId)
    // {
    //     $request->validate([
    //         'status' => 'required|in:pending,in progress,delivered,expired',
    //     ]);

    //     $order = Orders::findOrFail($orderId); 
    //     $order->status = $request->input('status');
    //     $order->save();

    //     return redirect()->route('manage_order.index')->with('success', 'Order status updated successfully.');
    // }


    public function updateStatus(Request $request, OrderDetails $orderDetail)
    {
        $request->validate([
            'status' => 'required|in:pending,in progress,delivered,expired',
        ]);

        $orderDetail->status = $request->input('status');
        $orderDetail->save();

        return redirect()->route('manage_order.index')->with('success', 'Order status updated successfully.');
    }
}
