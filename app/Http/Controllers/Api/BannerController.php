<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use PSpell\Config;

class BannerController extends Controller
{
    public function getPublishedBanner(): \Illuminate\Http\JsonResponse
    {
        try{
            $publishedBanner = Banner::where("published", true)->get();
            if(!$publishedBanner){
                return response()->json([
                    "code" => 400,
                    "message" => "ERROR",
                    'result' => null,
                    'error' => "There is no published banner!"
                ]);
            }
            foreach($publishedBanner as $banner){
                $banner->banner_image = Config("app.url_capstone")  . "/" . $banner->banner_image;
            }
            Log::channel("success")->debug("Get published banners successfully!");
            return response()->json([
                "code" => 200,
                "message" => "OK",
                'result' => [
                    "published_banners" => $publishedBanner
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
