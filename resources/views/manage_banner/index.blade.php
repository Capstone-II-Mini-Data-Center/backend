@extends('layouts.app')

@section('content')
  <div class="flex justify-between">
    <!-- Main Content -->
    <div class="w-6/7 bg-white mr-10 ml-10">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-semibold"></h1>
            <a href="{{ route('manage_banner.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Create Banner</a>
        </div>
        <div class="">
            
        </div>

        <table class="min-w-full border border-collapse rounded-lg overflow-hidden">
            <thead class="bg-blue-300">
                <tr>
                    <th class="w-2/7 py-2 px-4 border-b text-center">Title</th>
                    <th class="w-1/7 py-2 px-4 border-b text-center">Image</th>
                    <th class="w-3/7 py-2 px-4 border-b text-center">Description</th>
                    <th class="w-1/7 py-2 px-4 border-b text-center">Published</th>
                    <th class="w-1/7 py-2 px-4 border-b text-center">Package</th>
                    <th class="w-1/7 py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $index => $banner)
                    <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-gray-200' }}">
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
                        <td class="py-2 px-4 border-b text-center">
                            @if($banner->package)
                                <p>{{ $banner->package->name }}</p>
                            @else
                                <p>No associated package</p>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{ route('manage_banner.edit', $banner->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form id="deleteForm-{{ $banner->id }}" action="{{ route('manage_banner.destroy', $banner->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete('{{ $banner->id }}')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
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
