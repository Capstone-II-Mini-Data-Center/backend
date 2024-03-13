<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller
{
    public function updateProfile(Request $request, $id)
    {
        try {
            $validateUser = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                "phone_number" => 'nullable|min:9|unique:users,phone_number,' . $id,
            ]);

            if($validateUser->fails()){
                Log::channel("error")->debug("Validation update profile error!");
                return response()->json([
                    "code" => 400,
                    "message" => "ERROR",
                    'result' => null,
                    'error' => $validateUser->errors(),
                ], 401);
            }

            $user = User::where("id", $id)->first();
            $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number
            ]);
            return response()->json([
                "code" => 200,
                "message" => "Update Profile Successfully",
                'result' => [
                    "user" => $user
                ],
                'error' => null,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code" => 400,
                "message" => "Error",
                'result' => null,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
