<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;

class OrderHistoryController extends Controller
{
    public function getOrderHistory(Request $request)
    {
        try {
            $orders = Orders::where("user_id", $request->user_id)->with('orderDetails.package')->get();
            return response()->json([
                "code" => 200,
                "message" => "Get order history successfully",
                'result' => [
                    "Orders" => $orders
                ],
                'error' => null,
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                "code" => 400,
                "message" => "ERROR",
                'result' => null,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
