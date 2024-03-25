<?php

namespace App\Http\Controllers;

use App\Models\ServerCred;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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

            $orderDetails = $query->paginate(10);

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
        $order = OrderDetails::with('package')->find($orderDetail->id);
        $previousStatus = $orderDetail->status;
        $orderDetail->status = $request->input('status');
        $orderDetail->save();
//        dd($this->__createContainer($order));
        $credentials = [];
        if ($orderDetail->status === 'in progress'){
            $credentials =  $this->__createContainer($order);
            if (!empty($credentials)){
                $server = new ServerCred();
                $server->order_detail_id = $orderDetail->id;
                $server->username = $credentials['username'];
                $server->password = $credentials['password'];
                $server->save();
                if ($server->save()){
                    (new SendNotificationController)->sendNotification($orderDetail->id);
                }
            }
        }
//        dd($credentials);
        if ($orderDetail->status === 'delivered' && $previousStatus !== 'delivered') {
            $server = ServerCred::where('order_detail_id', '=', $orderDetail->id)->first();
//            $userEmail = 'pi.sreyneath@gmail.com';
            $userEmail = $orderDetail->order->user->email;
            Mail::to($userEmail)->send(new SendMail($orderDetail->package_name,$server->username, $server->password));
        }

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    }

    public function __createContainer($order)
    {
        $data = [];
        $vmid = $this->generateVmid();
        $memory = $order->package->memory * 1024;
        $cores =  $order->package->cpu;
        $diskStorage = $order->package->storage;
        $response = (new ProxmoxController)->createContainer($vmid, $memory, $cores, $diskStorage);
        if ($response->getStatusCode() === 200){
            $responseData = $response->getData(true);
            $data = [
                'username' => $responseData['result']['hostname'],
                'password' => $responseData['result']['password']
            ];
        }
        return $data;
    }


    private function generateVmid() {
       return rand(110,300);

    }
}
