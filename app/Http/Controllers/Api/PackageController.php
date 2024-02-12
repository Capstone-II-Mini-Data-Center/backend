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
            if(!$packages){
                return response()->json([
                    "code" => 400,
                    "message" => "ERROR",
                    'result' => null,
                    'error' => "There is no packages!"
                ]);
            }
            Log::channel("success")->debug("Get all packages successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                'result' => [
                    "packages" => $packages
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $package = Package::find($id);
            if(!$package){
                return response()->json([
                    "code" => 400,
                    "message" => "ERROR",
                    'result' => null,
                    'error' => "There is no package!"
                ]);
            }
            Log::channel("success")->debug("Get one package successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                'result' => [
                    "package" => $package
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getRecommendedPackages()
    {
        try{
            $recommendedPackages = Package::where("recommended", true)->get();
            if(!$recommendedPackages){
                return response()->json([
                    "code" => 400,
                    "message" => "ERROR",
                    'result' => null,
                    'error' => "There is no recommended packages!"
                ]);
            }
            Log::channel("success")->debug("Get recommended packages successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                'result' => [
                    "recommended_packages" => $recommendedPackages
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
