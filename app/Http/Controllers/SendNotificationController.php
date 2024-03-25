<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendNotificationController extends Controller
{
    public function sendNotification($order_detail_id)
    {
        $text = Http::withOptions([
            'verify' => false, // This option should be used with caution
        ])->get("https://api.telegram.org/bot7024147212:AAGrYDUgeTfJbHns5b-9r9eunUgf8k1H90c/sendMessage?chat_id=-4192788373&text=New Container has been created successfully for order detail id :  " . $order_detail_id);
            return response()->json([
                "code" => 200,
                "message" => "Notification sent successfully!",
                "result" => null,
                "error" => null
        ]);
    }
}
