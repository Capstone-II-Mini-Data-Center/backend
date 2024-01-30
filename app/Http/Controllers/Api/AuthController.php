<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
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
                "phone_number" => 'required|min:9|unique:users,phone_number',
                'password' => 'required|min:6|confirmed',
                'role' => 'required|in:' . implode(',', ["admin", "user"])
            ]);

            if($validateUser->fails()){
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
                "role" => $request->role
            ]);

            return response()->json([
                "code" => 200,
                "message" => "OK",
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'error' => null,
            ], 200);

        } catch (Exception $e) {
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
                return response()->json([
                    "code" => 400,
                    "message" => "Validation error",
                    'result' => null,
                    'error' => $validateUser->errors(),
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    "code" => 400,
                    "message" => "Email & Password does not match with our record.",
                    'result' => null,
                    'error' => null,
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                "code" => 200,
                "message" => "User Logged In Successfully",
                'token' => $user->createToken("API TOKEN")->plainTextToken,
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

    public function logoutUser(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            "code" => 200,
            "message" => "Logged out successfully",
            'result' => null,
            'error' => null,
        ]);
    }
}
