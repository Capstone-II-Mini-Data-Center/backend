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

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                "phone_number" => 'nullable|min:9|unique:users,phone_number',
                'password' => 'required|min:6|confirmed',
                'role' => 'required|in:' . implode(',', ["admin", "user"])
            ]);

            if($validateUser->fails()){
                Log::channel("error")->debug("Validation signup error!");
                return response()->json([
                    "code" => 400,
                    "message" => "ERROR",
                    'result' => null,
                    'error' => $validateUser->errors(),
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                "phone_number" => $request->phone_number,
                'password' => Hash::make($request->password),
                "role" => $request->role,
                "email_verified_at" => now()->addHours(7)
            ]);
            Log::channel("success")->debug("Signup successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                "result" => [
                    "user" => [
                        $user
                    ]
                ],
                'error' => null,
            ], 200);

        } catch (Exception $e) {
            Log::channel("error")->debug("Signup error!");
            return response()->json([
                "code" => 400,
                "message" => "ERROR",
                'result' => null,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                Log::channel("error")->debug("Validation login error!");
                return response()->json([
                    "code" => 400,
                    "message" => "Validation error",
                    'result' => null,
                    'error' => $validateUser->errors(),
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                Log::channel("error")->debug("Email and Password do not match login error!");
                return response()->json([
                    "code" => 400,
                    "message" => "Email & Password does not match with our record.",
                    'result' => null,
                    'error' => null,
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            $token = $user->createToken("API TOKEN")->plainTextToken;

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

            Log::channel("success")->debug("Signin successfully!");
            return response()->json([
                "code" => 200,
                "message" => "User Logged In Successfully",
                'result' => [
                    "token" => $token,
                    "token_expired" => $formattedDate,
                    "user_id" => $user->id
                ],
                'error' => null,
            ], 200);

        } catch (Exception $e) {
            Log::channel("error")->debug("Signin error!");
            return response()->json([
                    "code" => 400,
                    "message" => "Error",
                    'result' => null,
                    'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function logoutUser(Request $request)
    {
        $token = str_replace('Bearer ', '', request()->header('Authorization'));
        $userLogin = UserLogin::where("token", $token)->first();
        $userLogin->update([
                "token_expired" => now()
        ]);
        $request->user()->tokens()->delete();
        Log::channel("success")->debug("Logout successfully!");
        return response()->json([
            "code" => 200,
            "message" => "Logged out successfully",
            'result' => null,
            'error' => null,
        ]);
    }
}
