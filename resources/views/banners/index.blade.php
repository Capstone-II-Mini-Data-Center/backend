<!-- resources/views/banners/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-6xl bg-white mb-10 ml-12">
            <div class="flex justify-between py-3 px-6 border-b-2">
                <h1 class="text-2xl font-semibold" style="color: #3B82F6;">Banner Page</h1>
                <a href="{{ route('banners.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Banner</a>
            </div>
            <div class="py-3 px-6 flex justify-between">
                <div class=""></div>
                <form id="filterForm" action="{{ route('packages.index') }}" method="GET">
                    <div class="">
                        Filter Status
                    </div>
                    <div class="relative flex items-center">
                        <select name="published" id="published" class="border border-gray-400 w-48 rounded-md" onchange="submitForm()">
                            <option value="">All</option>
                            <option value="true"{{ request('published') === 'true' ? ' selected' : '' }}>Published</option>
                            <option value="false"{{ request('published') === 'false' ? ' selected' : '' }}>Not Published</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="shadow-lg rounded-xl px-5 py-5 border">
                <table class="min-w-full rounded-lg overflow-hidden">
                    <thead class="text-blue-500 ">
                        <tr>
                            <th class="w-3/7 py-2 px-4 border-b text-center">No</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Title</th>
                            <th class="w-36 py-2 px-4 border-b text-center">Banner Image</th>
                            <th class="w-36 py-2 px-4 border-b text-center">Promotion</th>
                            <th class="w-2/7 py-2 px-4 border-b text-center">Description</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Status</th>
                            <th class="w-1/7 py-2 px-2 border-b text-center">Package</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                            <tr>
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
                                <td class="py-2 px-4 border-b text-center">
                                    <button type="" class="{{ $banner->published ? 'bg-green-200' : 'bg-red-200'}} py-1 px-2 rounded-md text-xs">
                                        {{ $banner->published ? 'Published' : 'Not Published' }}
                                    </button>
                                </td>
                                <td class="py-2 px-2 border-b text-center">
                                    @if($banner->package)
                                        <p>{{ $banner->package->name }}</p>
                                    @else
                                        <p>No associated package</p>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b text-center ">
                                    <div class="flex flex-row justify-center items-center">
                                        <a href="{{ route('banners.edit', $banner->id) }}" class="mr-3" title="Edit">
                                            <i class="fas fa-edit" style="color: blue;"></i>
                                        </a>
                                        <form id="deleteForm" action="{{ route('banners.destroy', $banner->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete('{{ $banner->id }}')" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('banners.show', $banner->id) }}" class=" text-blue-501 mr-2">
                                            <div class=" flex justify-center items-center ml-3 " title="View Detail">
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
             <div class="p-3 flex justify-between">
                <div></div>
                <div>
                    @if ($banners->hasPages())
                        <ul class="pagination">
                            @if ($banners->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $banners->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($banners->getUrlRange(1, $banners->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $banners->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endforeach

                            @if ($banners->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $banners->nextPageUrl() }}">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    @else
                        <!-- If there's only one page of data, still display pagination links -->
                        <ul class="pagination">
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            <li class="page-item active"><span class="page-link">1</span></li>
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(bannerId) {
            console.log('Delete function called for banner ID:', bannerId);

            if (confirm('Are you sure you want to delete this banner?')) {
                document.getElementById('deleteForm').action = '{{ route('banners.destroy', '') }}/' + bannerId;
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
    <script>
        function submitForm() {
            document.getElementById("filterForm").submit();
        }
    </script>
@endsection
