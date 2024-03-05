<?php

namespace App\Http\Controllers\Api;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
            [
                'old_password' => 'required',
                'new_password' => 'required|confirmed'
            ]);

            if($validateUser->fails()){
                Log::channel("error")->debug("Validation change password error!");
                return response()->json([
                    "code" => 400,
                    "message" => "Validation error",
                    'result' => null,
                    'error' => $validateUser->errors(),
                ], 401);
            }

            $token = str_replace('Bearer ', '', request()->header('Authorization'));
            $userLogin = UserLogin::where("token", $token)->first();
            $user = User::where("id",   $userLogin->user_id)->first();

            if(!Hash::check($request->old_password, $user->password)){
                // Old password does not match
                return response()->json([
                    "code" => 401,
                    "message" => "Old password is incorrect",
                    'result' => null,
                    'error' => null,
                ], 401);
            }

            $token = $user->createToken("API TOKEN")->plainTextToken;

            $user->update([
                "password" => Hash::make($request->new_password)
            ]);

            $userLogin = UserLogin::create([
                "user_id" => $user->id,
                "user_name" => $user->name,
                "token" => $token,
                "token_expired" => now()->addDay()
            ]);

            // Parse the original timestamp using Carbon
            $carbonDate = Carbon::parse($userLogin->token_expired);

            // Convert to the desired format
            $formattedDate = $carbonDate->format('Y-m-d H:i:s');

            Log::channel("success")->debug("Change password successfully!");
            return response()->json([
                "code" => 200,
                "message" => "Change Password Successfully",
                'result' => [
                    "token" => $token,
                    "token_expired" => $formattedDate
                ],
                'error' => null,
            ], 200);

        } catch (Exception $e) {
            Log::channel("error")->debug("Change password error!");
            return response()->json([
                    "code" => 400,
                    "message" => "Error",
                    'result' => null,
                    'error' => $e->getMessage(),
            ], 500);
        }
    }
}
