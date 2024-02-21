<!-- resources/views/manage_package/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="w-6/7 bg-white mr-10 ml-10">
        <h1 class="text-2xl font-semibold mb-6">Edit Package</h1>
    </div>
    <div class="w-6/7 bg-white mr-10 ml-10 flex justify-center">        
        <form action="{{ route('manage_package.update', $package->id) }}" method="post" class="w-1/2 p-10 bg-gray-100 shadow-lg rounded-xl">
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
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        $
                    </span>
                    <input type="number" name="price" id="price" step="0.01" min="0" class="pl-10 pr-2 py-2 border rounded-md w-full" value="{{ old('price', $package->price) }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="cpu" class="block text-sm font-medium text-gray-700">CPU</label>
                <div class="flex flex-row items-center">
                    <div class="w-full pr-5">
                        <select name="cpu" id="cpu" class="pr-10 py-2 border rounded-md w-full" value="{{ old('cpu', $package->cpu) }}" required>
                            <option value="4">4</option>
                            <option value="8">8</option>
                            <option value="16">16</option>
                            <option value="32">32</option>
                        </select>
                    </div>    
                    <div class="text-black-500 border rounded-md py-2 px-2 ">
                        VCN
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <label for="memory" class="block text-sm font-medium text-gray-700">Memory</label>
                <div class="flex flex-row items-center">
                    <div class="w-full pr-6">
                        <select name="memory" id="memory" class="pr-11 py-2 border rounded-md w-full" value="{{ old('memory', $package->memory) }}" required>
                            <option value="4">4</option>
                            <option value="8">8</option>
                            <option value="16">16</option>
                            <option value="32">32</option>
                        </select>
                    </div>    
                    <div class="text-black-501 border rounded-md py-2 px-2 ">
                        GB
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <label for="storage" class="block text-sm font-medium text-gray-700">Storage</label>
                <div class="flex flex-row items-center">
                    <div class="w-full pr-6">
                        <select name="storage" id="storage" class="pr-11 py-2 border rounded-md w-full" value="{{ old('storage', $package->storage) }}"  required>
                            <option value="4">4</option>
                            <option value="8">8</option>
                            <option value="16">16</option>
                            <option value="32">32</option>
                            <option value="64">64</option>
                        </select>
                    </div>    
                    <div class="text-black-501 border rounded-md py-2 px-2 ">
                        GB
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <input type="checkbox" name="recommended" id="recommended" class="mr-2" value="1" {{ $package->recommended ? 'checked' : '' }}>
                <label for="recommended" class="text-sm text-gray-700">Recommended</label>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Package</button>
            </div>
        </form>
    </div>
@endsection
