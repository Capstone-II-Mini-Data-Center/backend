<!-- resources/views/banners/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-6xl bg-white mt-10 mb-10 ml-12">
            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-semibold" style="color: #3B82F6;">Banner Page</h1>
                <a href="{{ route('manage_banner.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Banner</a>
            </div>
            <div class="shadow-lg rounded-xl">
                <table class="min-w-full border border-collapse rounded-lg overflow-hidden">
                    <thead class="text-blue-500 border border-2">
                        <tr>
                            <th class="w-3/7 py-2 px-4 border-b text-center">No</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Title</th>
                            <th class="w-36 py-2 px-4 border-b text-center">Banner Image</th>
                            <th class="w-36 py-2 px-4 border-b text-center">Promotion</th>
                            <th class="w-2/7 py-2 px-4 border-b text-center">Description</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Published</th>
                            <th class="w-1/7 py-2 px-2 border-b text-center">Package</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                            <tr class="border border-2">
                                <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $banner->title }}</td>
                                <td class="py-2 px-4 border-b text-center">
                                    @if($banner->banner_image)
                                        <img src="{{ asset($banner->banner_image) }}" alt="Banner Image">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b text-center">{{ $banner->promotion }}</td>
                                <td class="py-2 px-4 border-b">{{ $banner->description }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $banner->published ? 'Yes' : 'No' }}</td>
                                <td class="py-2 px-2 border-b text-center">
                                    @if($banner->package)
                                        <p>{{ $banner->package->name }}</p>
                                    @else
                                        <p>No associated package</p>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b text-center ">
                                    <div class="flex flex-row justify-center items-center">
                                        <a href="{{ route('manage_banner.edit', $banner->id) }}" class="mr-3">
                                            <i class="fas fa-edit" style="color: blue;"></i>
                                        </a>
                                        <form id="deleteForm" action="{{ route('manage_banner.destroy', $banner->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete('{{ $banner->id }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <a href="#" class=" text-blue-501 mr-2">
                                            <div class=" flex justify-center items-center ml-3 mt-1">
                                                <i class="fa-regular fa-file-lines" style="color: blue;"></i>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(bannerId) {
            console.log('Delete function called for banner ID:', bannerId);

            if (confirm('Are you sure you want to delete this banner?')) {
                document.getElementById('deleteForm').action = '{{ route('manage_banner.destroy', '') }}/' + bannerId;
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endsection
