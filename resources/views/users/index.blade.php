<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center"> <!-- Center the content -->
        <div class="w-full max-w-6xl bg-white mt-10 mb-10 ml-12"> <!-- Set max width and full width -->
            <div class="flex flex-row justify-between">
                <div class="flex justify-between mb-4">
                    <h1 class="text-2xl font-semibold" style="color: #3B82F6;" >User Page</h1>
                </div>
                <div class="mb-4">
                   <form action="{{ route('users.index') }}" method="GET">
                        <div class="relative flex items-center">
                            <input 
                                type="text" 
                                name="search" 
                                id="search" 
                                class="mt-1 p-2 border border-gray-400 rounded-md w-full pl-10 flex items-center" 
                                placeholder="Enter name..." 
                                value="{{ request('search') }}"
                                autocomplete="off"
                            >
                            <button type="submit" class=" flex items-center absolute inset-y-0 right-0 px-4 py-2 rounded-md">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form> 
                </div>
            </div>

            <div class="shadow-lg rounded-xl">
            <table class="min-w-full rounded-lg overflow-hidden">
                <thead class="text-blue-500 border border-2">
                    <tr>
                        <th class="w-3/7 py-2 px-4 border-b text-center">No</th>
                        <th class="w-3/7 py-2 px-4 border-b text-center">Name</th>
                        <th class="w-2/7 py-2 px-4 border-b text-center">Email</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Phone Number</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <!-- <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-gray-200' }}"> -->
                        <tr class="border border-b-2">
                            <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $user->phone_number }}</td>
                            <td class="py-2 px-4 border-b text-center flex items-center justify-center">
                                <button class="flex items-center bg-blue-500 text-white rounded-lg py-2 hover:bg-blue-300">
                                    <a href="{{ route('users.show', $user->id) }}" class=" text-blue-501 mr-2">
                                        <div class="flex justify-between items-center ">
                                            <div class="ml-4">
                                                Detailed
                                            </div>
                                            <div class=" flex justify-center items-center ml-3">
                                                 <i class="fas fa-edit" style="color: white;"></i> 
                                            </div>
                                        
                                        </div>
                                    </a>  
                                </button> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-3 flex justify-between">
                <div></div>
                <!-- <div>
                    {{ $users->links() }}
                </div> -->
                <div>
                    @if ($users->hasPages())
                        <ul class="pagination">
                            @if ($users->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endforeach

                            @if ($users->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">&raquo;</a></li>
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
@endsection
