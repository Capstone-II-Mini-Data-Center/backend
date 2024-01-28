<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Banner;
use Illuminate\Http\Request;

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
            return response()->json([
                'error' => null,
                'payload' => ['Published banners' => $publishedBanner]
            ]);
        }catch (Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
                'payload' => null
            ]);
        }
    }
}
