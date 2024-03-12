<?php

namespace App\Http\Controllers\Api;
use App\Models\User;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SendNotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $order_id = $request->order_id;
        $order = Orders::find($order_id);
        $user = User::find($order->user_id);
        $text = Http::get("https://api.telegram.org/bot7024147212:AAGrYDUgeTfJbHns5b-9r9eunUgf8k1H90c/sendMessage?chat_id=-4192788373&text=NEW ORDER HAS BEEN PLACED !!! " . "%0A". "ID: " . $user->id . "%0A" . "Name: ". $user->name . "%0A" . "Email: ". $user->email);
        $image = Http::get("https://api.telegram.org/bot7024147212:AAGrYDUgeTfJbHns5b-9r9eunUgf8k1H90c/sendPhoto?chat_id=-4192788373&photo=" . $order->payment_image);
            return response()->json([
                "code" => 200,
                "message" => "Notification sent successfully!",
                "result" => null,
                "error" => null
        ]);
    }
}
