<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\BannerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'createUser']);

Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::post("/auth/logout", [AuthController::class, "logoutUser"])->middleware("auth:sanctum");

Route::apiResource('/package', PackageController::class);

Route::get("/getRecommendedPackage", [PackageController::class, "getRecommendedPackages"]);

Route::get("/getPublishedBanner", [BannerController::class, "getPublishedBanner"]);
