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
        ]);
        $package = new Package();
        $package->name = $request->input('name');
        $package->description = $request->input('description');
        $package->price = $request->input('price');
        $package->cpu = $request->input('cpu');
        $package->memory = $request->input('memory');
        $package->storage = $request->input('storage');
        $package->recommended = $request->has('recommended') ? true : false;
        $package->save();

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
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->all());
        $package->recommended = $request->filled('recommended');
        $package->save();

        return redirect()->route('manage_package.index')->with('success', 'Package updated successfully');
    }

    public function destroy($id)
{
    $package = Package::findOrFail($id);
    $package->delete();

    return redirect()->route('manage_package.index')->with('success', 'Package deleted successfully');
}



}
