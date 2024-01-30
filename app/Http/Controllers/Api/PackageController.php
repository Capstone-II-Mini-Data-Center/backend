<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Package;
use Illuminate\Http\Request;
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
            return response()->json([
                'error' => null,
                'payload' => ['packages' => $packages]
            ]);
        }catch (Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
                'payload' => null
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
    public function show(string $id)
    {
        //
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

            return response()->json([
                'error' => null,
                'payload' => ['Recommended packages' => $recommendedPackages],

            ]);
        }catch (Exception $e){

            return response()->json([
                'error' => $e->getMessage(),
                'payload' => null
            ]);
        }
    }
}
