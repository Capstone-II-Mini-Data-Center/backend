<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function getPublishedBanner()
    {
        try{
            $publishedBanner = Banner::where("published", true)->get();
            Log::channel("success")->debug("Get published banners successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                'result' => [
                    "Published banners" => $publishedBanner
                ],
                'error' => null,
            ]);
        }catch (Exception $e){
            Log::channel("error")->debug("Get published banners error!");
            return response()->json([
                "code" => 400,
                "message" => "ERROR",
                'result' => null,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
