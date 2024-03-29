<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;  
use App\Models\User;
use Carbon\Carbon; 

class ManageOrderController extends Controller
{
    // public function index()
    // {
    //     $orders = Orders::with('user')->get(); 
    //     return view('manage_order.index', compact('orders'));
    // }
    
    public function index(Request $request)
    {
        $status = $request->input('status');
        $username = $request->input('user_name');
        $plan = $request->input('plan'); 
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $query = OrderDetails::with('order.user');

        if ($status) {
            $query->where('status', $status);
        }

         if ($username) {
            $query->join('orders', 'order_details.order_id', '=', 'orders.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->where('users.name', 'like', "%$username%");
        }

        if ($plan) {
        $query->where('plan', $plan);

        }
        if ($start_date && $end_date) {
            $start_date = Carbon::parse($start_date)->startOfDay();
            $end_date = Carbon::parse($end_date)->endOfDay();
            $query->whereBetween('expired_date', [$start_date, $end_date]);
        }

            $orderDetails = $query->get();

            return view('manage_order.index', compact('orderDetails', 'status','username','plan','start_date','end_date'));
        }

        public function resetFilters(Request $request)
    {
        // Redirect to the index route without any filters
        return redirect()->route('manage_order.index');
    }

    
    public function show($orderId)
    {
        $order = Orders::with('order_details.package')->findOrFail($orderId);
        return view('manage_order.show', compact('order'));
    }


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
