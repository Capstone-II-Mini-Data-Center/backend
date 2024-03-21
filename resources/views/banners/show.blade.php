<!-- manage_banner/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-3 shadow-lg rounded-xl " style="background-color: #FAFAFA;">
        <div class="flex justify-between py-3 px-6 border-b-2 bg-white rounded-xl">
            <h1 class="text-2xl font-semibold" style="color: #3B82F6;">Banner Detail</h1>
        </div>
        <div class="mt-5 flex gap-10 ">
            <div class="w-3/4 shadow-lg rounded-xl p-5 flex gap-10 bg-white">
                <div class="w-2/6">
                    <div class="text-3xl font-bold flex justify-center pb-5" style="color: #3B82F6;">
                    {{ $banner->title }}
                    </div>
                    <div class="mb-3">
                        @if($banner->banner_image)
                            <img src="{{ asset($banner->banner_image) }}" alt="Banner Image" class="rounded-xl">
                        @else
                            No Image
                        @endif
                    </div>
                </div>
                <div class="flex flex-col justify-center pt-12">
                    <div class="flex gap-5">
                        <strong class="text-orange-400">Status:</strong>
                        <div>
                            {{ $banner->published ? 'Published' : 'Not Published' }}
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <strong class="text-orange-400">Package:</strong>
                        <div>
                            @if($banner->package)
                                {{ $banner->package->name }}
                            @else
                                No associated package
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center shadow-lg rounded-lg px-5 ">
                    <div class="text-orange-400 text-xl font-semibold mb-3">
                        Promotion
                    </div>
                    <div class="text-6xl font-bold text-orange-400">
                        {{ $banner->promotion }} %
                    </div>
                </div>
            </div>
            <div class="bg-white w-1/3 p-5 shadow-lg rounded-xl">
                <div class="font-bold" style="color: #3B82F6;">
                    Description
                </div>
                <div class="text-blue-400">
                    {{ $banner->description }}
                </div>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('banners.index') }}" class="text-blue-500 hover:text-blue-700">&larr; Back to Banners</a>
        </div>
    </div>
@endsection
