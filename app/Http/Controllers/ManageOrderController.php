<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders; 
use App\Models\User;

class ManageOrderController extends Controller
{
    public function index()
    {
        $orders = Orders::with('user')->get(); 
        return view('manage_order.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Orders::with('order_details.package')->findOrFail($orderId);
        return view('manage_order.show', compact('order'));
    }

    public function updateStatus(Request $request, $orderId)
    {
        $request->validate([
            'status' => 'required|in:pending,in progress,delivered,expired',
        ]);

        $order = Orders::findOrFail($orderId); 
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('manage_order.index')->with('success', 'Order status updated successfully.');
    }
}
