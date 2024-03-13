<!-- resources/views/manage_banner/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="w-6/7 bg-white mr-10 ml-10">
        <h1 class="text-2xl font-semibold mb-6" style="color: #3B82F6;">Edit Banner</h1>
    </div>
    <div class="w-6/7 bg-white mr-10 ml-10 flex justify-center">
        <!-- <h1 class="text-2xl font-semibold mb-6" style="color: #3B82F6;">Edit Banner</h1> -->
        <form action="{{ route('manage_banner.update', $banner->id) }}" method="post" enctype="multipart/form-data" class="w-1/2 p-10 bg-gray-100 shadow-lg rounded-xl">

            @csrf
            @method('put') <!-- Use the "put" method for updates -->

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 border rounded-md w-full" value="{{ old('title', $banner->title) }}" required>
            </div>

            <div class="mb-4">
                <label for="promotion" class="block text-sm font-medium text-gray-700">Promotion</label>
                <input type="number" name="promotion" id="promotion" class="mt-1 p-2 border rounded-md w-full" value="{{ old('promotion', $banner->promotion) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 p-2 border rounded-md w-full" required>{{ old('description', $banner->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="banner_image" class="block text-sm font-medium text-gray-700">Banner Image</label>
                <div class="relative">
                    <input type="file" name="banner_image" id="banner_image" class="mt-1 p-2 border rounded-md w-full" onchange="previewImage(this)">
                    <img id="banner_image_preview" src="{{ asset($banner->banner_image) }}" alt="Banner Image" class="mt-2">
                </div>
                @if(!$banner->banner_image)
                    <p>No Image</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="published" class="block text-sm font-medium text-gray-700">Published</label>
                <input type="checkbox" name="published" id="published" class="mr-2" value="1" {{ $banner->published ? 'checked' : '' }}>
            </div>

            <div class="mb-4">
                <label for="package_id" class="block text-sm font-medium text-gray-700">Package</label>
                <div class="relative">
                    <select name="package_id" id="package_id" class="pr-10 py-2 border rounded-md w-full">
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}" {{ $banner->package_id == $package->id ? 'selected' : '' }}>
                                {{ $package->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Banner</button>
            </div>
        </form>
    </div>

    <script>
    function previewImage(input) {
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('banner_image_preview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
</script>
@endsection
