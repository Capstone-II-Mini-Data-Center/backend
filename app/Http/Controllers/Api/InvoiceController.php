<?php

namespace App\Http\Controllers\Api;

use App\Models\Orders;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class InvoiceController extends Controller
{
    public function upload(Request $request) {
        $order = Orders::latest()->first();
        if(!is_null($order->payment_image)){
            return response()->json([
                "code" => 400,
                "message" => "There is no order yet",
                "result" => null,
                "errors" => "error"
            ]);
        }else{
            $validator = Validator::make($request->all(),
                [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]
            );

            if($validator->fails()) {
                return response()->json([
                    "code" => 400,
                    "message" => "Validation error",
                    "result" => [],
                    "errors" => $validator->errors()
                ]);
            }

            $image = $request->file('image');

            // Upload image to Cloudinary
            $upload = Cloudinary::upload($image->getRealPath())->getSecurePath();
            // $image = $request->file("image");
            // $filename = Str::random(32).".".$image->getClientOriginalExtension();
            // $image->move('uploads/', $filename);

            $order->update([
                'payment_image' => $upload
            ]);

            return response()->json([
                "code" => 200,
                "message" => "Invoice uploaded successfully!",
                "result" => [
                    "order" => $order
                ],
                "error" => null
            ]);
        }
    }
}
