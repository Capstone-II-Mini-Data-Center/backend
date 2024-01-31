<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Banner;
use App\Models\Package;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::with('package')->get();
        return view('manage_banner.index', compact('banners'));
    }

    public function create()
    {
        $packages = Package::all();
        $banner = new Banner(); 
        return view('manage_banner.create', compact('packages','banner'));
    }

    public function store(Request $request)

    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published' => 'boolean',
            'package_id' => 'exists:packages,id',
            
        ]);

        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // $banner->banner_image = $imageName;
            $banner->banner_image = 'images/' . $imageName;
        }
        $banner->published = $request->has('published') ? true : false;
        $banner->package_id = $request->input('package_id');
        $banner->save();

        return redirect()->route('manage_banner.index')->with('success', 'Banner created successfully');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $packages = Package::all();
        return view('manage_banner.edit', compact('banner', 'packages'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published' => 'boolean',
            'package_id' => 'exists:packages,id',
        ]);

        $banner = Banner::findOrFail($id);
        $packages = Package::all();
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $banner->banner_image = 'images/' . $imageName;
        }
        $banner->published = $request->filled('published');

        $banner->package_id = $request->input('package_id');
        $banner->save();

        return redirect()->route('manage_banner.index')->with('success', 'Banner updated successfully');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('manage_banner.index')->with('success', 'Banner deleted successfully');
    }
}
