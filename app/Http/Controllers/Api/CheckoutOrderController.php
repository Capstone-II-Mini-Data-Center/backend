<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\UserLogin;
use Exception;
use Illuminate\Http\Request;

class CheckoutOrderController extends Controller
{
    public function checkoutOrder(Request $request)
    {
        try {
            $token = str_replace('Bearer ', '', request()->header('Authorization'));
            $userLogin = UserLogin::where("token", $token)->first();
            $order = Orders::create([
                "total_amount" => null,
                "payment_image" => null,
                "user_id" => $userLogin->user_id
            ]);
//            dd($order);
            $orderDetails = $request->all();
//            dd($orderDetails);
            $total_price = 0;
            foreach ($orderDetails as $orderDetail) {
                OrderDetails::create([
                    "status" => "pending",
                    "os" => $orderDetail["os"],
                    "plan" => $orderDetail["plan"],
                    "package_id" => $orderDetail["package_id"],
                    "order_id" => $order->id,
                    "package_name" => $orderDetail["package_name"],
                    "unit_price" => $orderDetail["unit_price"],
                    "discount_amount" => 0,
                    "total_amount" => $orderDetail["unit_price"] * intval($orderDetail["plan"]),
                    "expired_date" => now()->addDays(intval($orderDetail["plan"]))
                ]);
                $total_price += ($orderDetail   ["unit_price"] * intval($orderDetail["plan"]));
            }

            $order->update([
                "total_amount" => $total_price
            ]);
            return response()->json([
                "code" => 200,
                "message" => "Checkout order successfully!",
                "result" => [
                    "order" => $order
                ],
                "error" => null
            ]);
        } catch (Exception $e) {
            return response()->json([
                "code" => 400,
                "message" => "ERROR",
                'result' => null,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
