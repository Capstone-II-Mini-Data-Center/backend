<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center"> <!-- Center the content -->
        <div class="w-full max-w-6xl bg-white mt-10 mb-10 ml-12"> <!-- Set max width and full width -->

            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-semibold"></h1>
            </div>
            <div class="shadow-lg rounded-xl">
            <table class="min-w-full border border-collapse  rounded-lg overflow-hidden">
                <thead class="text-blue-500 border border-2">
                    <tr>
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
                            <td class="py-2 px-4 border-b text-center">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $user->phone_number }}</td>
                            <td class="py-2 px-4 border-b text-center flex items-center justify-center">
                                <a href="#" class=" text-blue-500 hover:text-blue-300 mr-2">
                                    <div class="flex justify-center items-center">
                                        <div class="ml-10">
                                            Detailed
                                        </div>
                                        <div class=" flex justify-center items-center ml-3">
                                            <!-- <a href="#" class="text-yellow-500 hover:text-yellow-700 mr-2"> -->
                                                <img src="{{ asset('images/detail-icon.png') }}" alt="icon" class="w-7 h-7 flex">
                                            <!-- </a> -->
                                        </div>
                                    
                                    </div>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
