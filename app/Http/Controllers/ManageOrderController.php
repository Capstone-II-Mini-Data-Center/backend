<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;



class ManageOrderController extends Controller
{
    // public function index()
    // {
    //     $orders = Orders::with('user')->get();
    //     return view('orders.index', compact('orders'));
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

            return view('orders.index', compact('orderDetails', 'status','username','plan','start_date','end_date'));
        }

        public function resetFilters(Request $request)
    {
        // Redirect to the index route without any filters
        return redirect()->route('orders.index');
    }


    public function show($orderId)
    {
        $order = Orders::with('order_details.package')->findOrFail($orderId);
        return view('orders.show', compact('order'));
    }


    public function updateStatus(Request $request, OrderDetails $orderDetail)
    {
        $request->validate([
            'status' => 'required|in:pending,in progress,delivered,expired',
        ]);
        $previousStatus = $orderDetail->status;
        $orderDetail->status = $request->input('status');
        $orderDetail->save();

        if ($orderDetail->status === 'delivered' && $previousStatus !== 'delivered') {
        $userEmail = $orderDetail->order->user->email;
        Mail::to($userEmail)->send(new SendMail($orderDetail->package_name));
        }

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    }
}
