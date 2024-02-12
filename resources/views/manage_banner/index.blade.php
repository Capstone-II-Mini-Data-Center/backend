@extends('layouts.app')

@section('content')
  <div class="flex justify-between">
    <!-- Main Content -->
    <div class="w-6/7 bg-white mr-10 ml-10">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-semibold"></h1>
            <a href="{{ route('manage_banner.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Banner</a>
        </div>
        <div class="">
            
        </div>
        <div class="shadow-xl rounded-xl" >
            <table class="min-w-full border border-collapse rounded-lg">
                <thead class="text-blue-500">
                    <tr class="border border-2">
                        <th class="w-1/7 py-2 px-4 border-b text-center">Title</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Image</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Description</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Published</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Package</th>
                        <th class="w-2/7 py-2 px-8 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $index => $banner)
                        <tr class="border border2">
                            <td class="py-2 px-4 border-b text-center">{{ $banner->title }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                @if($banner->banner_image)
                                    <img src="{{ asset($banner->banner_image) }}" alt="Banner Image">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">{{ $banner->description }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $banner->published ? 'Yes' : 'No' }}</td>
                            <td class="py-2 px-2 border-b text-center">
                                @if($banner->package)
                                    <p>{{ $banner->package->name }}</p>
                                @else
                                    <p>No associated package</p>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                <a href="{{ route('manage_banner.edit', $banner->id) }}" class="">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            Edit
                                        </div>
                                        <div class="ml-3">
                                            <img src="{{ asset('images/edit-icon.png') }}" alt="icon" class="w-4 h-4 flex">
                                        </div>
                                    </div>
                                </a>
                                <form id="deleteForm-{{ $banner->id }}" action="{{ route('manage_banner.destroy', $banner->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete('{{ $banner->id }}')">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            Delete
                                        </div>
                                        <div class="ml-3">
                                            <img src="{{ asset('images/delete-icon.png') }}" alt="icon" class="w-5 h-5 flex">
                                        </div>
                                    </div>
                                    <button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
  </div>

  <script>
   function confirmDelete(bannerId) {
        console.log('Delete function called for banner ID:', bannerId);

        if (confirm('Are you sure you want to delete this banner?')) {
            document.getElementById('deleteForm-' + bannerId).submit();
        }
    }
  </script>

@endsection
