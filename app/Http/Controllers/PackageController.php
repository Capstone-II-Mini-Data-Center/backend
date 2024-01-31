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
        return view('manage_package.index', compact('packages'));
    }

    public function create()
    {
        return view('manage_package.create');
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
            'recommended' => 'boolean',
        ]);

        Package::create($request->all());

        return redirect()->route('manage_package.index')->with('success', 'Package created successfully');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('manage_package.edit', compact('package'));
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
            'recommended' => 'boolean',
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->all());

        return redirect()->route('manage_package.index')->with('success', 'Package updated successfully');
    }
    
    public function destroy($id)
{
    $package = Package::findOrFail($id);
    $package->delete();

    return redirect()->route('manage_package.index')->with('success', 'Package deleted successfully');
}


    
}