<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center"> <!-- Center the content -->
        <div class="w-full bg-white mt-10 mb-10 ml-12 rounded-lg">
            <div class="py-3 px-6 border-b-2">
                <h1 class="text-2xl font-semibold" style="color: #3B82F6;" >User Page</h1>
            </div>
            <div class="py-3 px-6 flex justify-between">
                <div class=""></div>
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="relative flex items-center w-52">
                        <input 
                            type="text" 
                            name="search" 
                            id="search" 
                            class="p-2 border border-gray-400 rounded-md w-full pl-10 flex items-center" 
                            placeholder="Search" 
                            value="{{ request('search') }}"
                            autocomplete="off"
                        >
                        <button type="submit" class=" flex items-center absolute inset-y-0 right-0 px-4 py-2 rounded-md">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form> 
            </div>

            <div class="shadow-lg rounded-xl px-5 py-5 border">
            <table class="min-w-full rounded-lg overflow-hidden">
                <thead class="text-blue-500">
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
                        <tr class="">
                            <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $user->phone_number }}</td>
                            <td class="py-2 px-4 border-b text-center flex items-center justify-center">
                                <button class="flex items-center text-white rounded-lg py-2 ">
                                    <a href="{{ route('users.show', $user->id) }}" class=" text-blue-501 mr-2">
                                        <div class="flex justify-between items-center ">
                                            <div class=" flex justify-center items-center ml-3 " title="View Detail"> 
                                                <i class="fa-regular fa-file-lines" style="color: blue;"></i>
                                            </div>
                                        
                                        </div>
                                    </a>  
                                </button> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    
@endsection
