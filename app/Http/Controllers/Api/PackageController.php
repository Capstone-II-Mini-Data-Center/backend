<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $packages = Package::all();
            Log::channel("success")->debug("Get all packages successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                'result' => [
                    "Packages" => $packages
                ],
                'error' => null,
            ]);
        }catch (Exception $e){
            Log::channel("error")->debug("Get all packages error!");
            return response()->json([
                "code" => 400,
                "message" => "ERROR",
                'result' => null,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        try{
            $package = Package::find($package->id);
            Log::channel("success")->debug("Get one package successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                'result' => [
                    "Package" => $package
                ],
                'error' => null,
            ]);
        }catch (Exception $e){
            Log::channel("error")->debug("Get one package error!");
            return response()->json([
                "code" => 400,
                "message" => "ERROR",
                'result' => null,
                'error' => $e->getMessage(),
            ]);
        }
    }


    public function getRecommendedPackages()
    {
        try{
            $recommendedPackages = Package::where("recommended", true)->get();
            Log::channel("success")->debug("Get recommended packages successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                'result' => [
                    "Recommended packages" => $recommendedPackages
                ],
                'error' => null,
            ]);
        }catch (Exception $e){
            Log::channel("error")->debug("Get recommended packages error!");
            return response()->json([
                "code" => 400,
                "message" => "ERROR",
                'result' => null,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
