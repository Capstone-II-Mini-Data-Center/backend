<!-- resources/views/manage_package/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="w-6/7 bg-white mr-10 ml-10">
        <h1 class="text-2xl font-semibold mb-6">Edit Package</h1>
        <form action="{{ route('manage_package.update', $package->id) }}" method="post">

            @csrf
            @method('put') <!-- Use the "put" method for updates -->

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name', $package->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 p-2 border rounded-md w-full" required>{{ old('description', $package->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" step="0.01" class="mt-1 p-2 border rounded-md w-full" value="{{ old('price', $package->price) }}" required>
            </div>

            <div class="mb-4">
                <label for="cpu" class="block text-sm font-medium text-gray-700">CPU</label>
                <input type="text" name="cpu" id="cpu" class="mt-1 p-2 border rounded-md w-full" value="{{ old('cpu', $package->cpu) }}" required>
            </div>

            <div class="mb-4">
                <label for="memory" class="block text-sm font-medium text-gray-700">Memory</label>
                <input type="text" name="memory" id="memory" class="mt-1 p-2 border rounded-md w-full" value="{{ old('memory', $package->memory) }}" required>
            </div>

            <div class="mb-4">
                <label for="storage" class="block text-sm font-medium text-gray-700">Storage</label>
                <input type="text" name="storage" id="storage" class="mt-1 p-2 border rounded-md w-full" value="{{ old('storage', $package->storage) }}" required>
            </div>

            <div class="mb-4">
                <input type="checkbox" name="recommended" id="recommended" class="mr-2">
                <label for="recommended" class="text-sm text-gray-700" value="{{ old('recommended', $package->recommended) }}">Recommended</label>
            </div>


            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Package</button>
            </div>
        </form>
    </div>
@endsection
