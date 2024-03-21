<!-- manage_package/show.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- <div class="flex justify-center items-center h-full">
        <div class="w-full bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-semibold mb-4">{{ $package->name }}</h1>
            <p class="mb-2"><strong>Description:</strong> {{ $package->description }}</p>
            <p class="mb-2"><strong>Price:</strong> ${{ number_format($package->price, 2) }}</p>
            <p class="mb-2"><strong>CPU:</strong> {{ $package->cpu }}</p>
            <p class="mb-2"><strong>Memory:</strong> {{ $package->memory }}</p>
            <p class="mb-2"><strong>Storage:</strong> {{ $package->storage }}</p>
            <p><strong>Recommended:</strong> {{ $package->recommended ? 'Yes' : 'No' }}</p> -->
            <!-- Add any additional information you want to display -->

            <!-- Back button -->
            <!-- <div class="mt-6">
                <a href="{{ route('manage_package.index') }}" class="text-blue-500 hover:text-blue-700">&larr; Back to Packages</a>
            </div>
        </div>
    </div> -->

    <div class="w-full px-6 py-3 shadow-lg rounded-xl " style="background-color: #FAFAFA;">
        <div class="flex justify-between py-3 px-6 border-b-2 bg-white rounded-xl">
            <h1 class="text-2xl font-semibold" style="color: #3B82F6;">Detailed Page</h1>
        </div>
        <div class="mt-5 flex gap-10 ">
            <div class=" w-2/3 shadow-lg rounded-xl p-5 flex gap-10 bg-white">
                <div class="text-3xl font-bold p-5 bg-blue-500 rounded-xl h-full w-2/6 flex items-center justify-center" style="color: #FFFFFF;">
                   {{ $package->name }}
                </div>
                <div class="">
                    <div class="text-orange-500 text-xl font-semibold mb-3">
                        {{ $package->recommended ? 'Recommended' : 'Not Recommend' }}
                    </div>
                    <div class="flex gap-5 text-orange-400">
                       <div class="mb-3" style="color: #3B82F6;">
                            <Strong>
                                Price:
                            </Strong>
                       </div>
                       <div>
                         ${{ number_format($package->price, 2) }}
                       </div>
                    </div>
                    <div class="flex gap-5 text-orange-400">
                       <div class="mb-3" style="color: #3B82F6;">
                            <Strong>
                                CPU:
                            </Strong>
                       </div>
                       <div>
                        {{ $package->cpu }} VCN
                       </div>
                    </div>
                    <div class="flex gap-5 text-orange-400" >
                       <div class="mb-3" style="color: #3B82F6;">
                            <Strong>
                                Memory:
                            </Strong>
                       </div>
                       <div>
                        {{ $package->memory }} GB
                       </div>
                    </div>
                    <div class="flex gap-5 text-orange-400">
                       <div class="mb-3" style="color: #3B82F6;">
                            <Strong>
                                Storage:
                            </Strong>
                       </div>
                       <div>
                         {{ $package->storage }} GB
                       </div>
                    </div>
                </div>
            </div>
            <div class="bg-white w-1/3 p-5 shadow-lg rounded-xl">
                <div class="font-bold" style="color: #3B82F6;">
                    Description
                </div>
                <div class="text-blue-400">
                    {{ $package->description }}
                </div>
            </div>
        </div>
         <div class="mt-6">
                <a href="{{ route('packages.index') }}" class="text-blue-500 hover:text-blue-700">&larr; Back to Packages</a>
            </div>
    </div>
@endsection
