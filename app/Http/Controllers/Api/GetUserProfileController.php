<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetUserProfileController extends Controller
{
    public function getUserProfile(Request $request)
    {
        try {
            $token = str_replace('Bearer ', '', request()->header('Authorization'));
            $userLogin = UserLogin::where("token", $token)->first();
            $user = User::where("id",   $userLogin->user_id)->first();
            if($userLogin->token_expired > now()){
                $is_expired = false;
            }else{
                $is_expired = true;
            }
            return response()->json([
                "code" => 200,
                "message" => "Get user profile successfully!",
                'result' => [
                    "user" => [
                        "id" => $user->id,
                        "name" => $user->name,
                        "email" => $user->email,
                        "phone_number" => $user->phone_number,
                        "password" => $user->password,
                        "role" => $user->role
                    ],
                    "token" => $token,
                    "is_expired" => $is_expired,
                    "expired_date" => $userLogin->token_expired
                ],
                'error' => null,
            ]);
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
