<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('packages.show', compact('package'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'cpu' => 'required|string',
            'memory' => 'required|string',
            'storage' => 'required|string',


        ]);

        $package = Package::create($request->all());
        $package->recommended = $request->has('recommended');
        $package->save();

        // $packageData['recommended'] = $request->has('recommended');


        return redirect()->route('packages.index')->with('success', 'Package created successfully');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);

        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'cpu' => 'required|string',
            'memory' => 'required|string',
            'storage' => 'required|string',


        ]);

        $package = Package::findOrFail($id);
        $package->update($request->all());
        // $package->update($request->all());
        // $package->recommended = $request->has('recommended');

        $package->recommended = $request->filled('recommended');
        $package->save();

        return redirect()->route('packages.index')->with('success', 'Package updated successfully');
    }

    public function destroy($id)
{
    $package = Package::findOrFail($id);
    $package->delete();

    return redirect()->route('packages.index')->with('success', 'Package deleted successfully');
}

public function search(Request $request)
{
    $search = $request->input('name');
    $packages = Package::where('name', 'like', '%' . $search . '%')->get();

    return view('packages.index', compact('packages'));
}

public function filterByRecommended(Request $request)
{
    $recommended = $request->input('recommended');
    $packages = Package::where('recommended', $recommended)->get();

    return view('packages.index', compact('packages'));
}

public function filterByPriceRange(Request $request)
{
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    $packages = Package::whereBetween('price', [$minPrice, $maxPrice])->get();

    return view('packages.index', compact('packages'));
}




}
