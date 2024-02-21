@extends('layouts.app')

@section('content')
  <div class="flex justify-between">
    <!-- Main Content -->
    <div class="w-full bg-white mr-5 ml-10 relative ">
        <div class="flex">
            <div>
                <form action="{{ route('manage_package.filterByPriceRange') }}" method="GET">
                   
                </form>
            </div>
            <div class="ml-auto mr-4">
                <!-- <form id="filterByRecommendedForm" action="{{ route('manage_package.filterByRecommended') }}" method="GET">
                    <select name="recommended" onchange="document.getElementById('filterByRecommendedForm').submit()" class="mt-1 border border-gray-400 rounded-md w-full"> -->
                        <!-- <option value="">All</option> -->
                        <!-- <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </form> -->
            </div>
            <div class="">
                <form action="{{ route('manage_package.search') }}" method="GET">
                    <div class="relative flex items-center">
                            <input 
                            type="text" 
                            name="name" 
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
        <div class="">
            <div class="flex justify-between mb-4 mt-10">
                <h1 class="text-2xl font-semibold" style="color: #3B82F6;">Package Page</h1>
                <a href="{{ route('manage_package.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Package</a>
            </div>
        </div> 
        <div class="shadow-lg rounded-xl">
            <table class="w-full border border-collapse rounded-lg overflow-hidden">
                <thead class="text-blue-500 border border-2">
                    <tr>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Name</th>
                        <!-- <th class="w-2/7 py-2 px-4 border-b text-center">Description</th> -->
                        <th class="w-1/7 py-2 px-4 border-b text-center">Price</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">CPU</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Memory</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Storage</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Recommended</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead
                <tbody>
                    @foreach($packages as $index => $package)
                        <tr class="border border-2">
                            <td class="py-2 px-4 border-b text-center">{{ $package->name }}</td>
                            <!-- <td class="py-2 px-4 border-b">{{ $package->description }}</td> -->
                            <td class="py-2 px-4 border-b text-center">${{ number_format($package->price, 2) }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->cpu }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->memory }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->storage }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->recommended? 'Yes' : 'No' }}</td>
                            <td class="py-2 px-4 border-b text-center flex flex-row items-center justify-center">
                                <a href="{{ route('manage_package.edit', $package->id) }}" class="mr-3">
                                    <i class="fas fa-edit" style="color: blue;"></i>
                                </a>
                                <form id="deleteForm" action="{{ route('manage_package.destroy', $package->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete('{{ $package->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                    <a href="#" class=" text-blue-501 mr-2">
                                        <div class=" flex justify-center items-center ml-3 mt-1">
                                            <i class="fa-regular fa-file-lines" style="color: blue;"></i>
                                        </div>
                                    </a>  
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div.class>
</div>

<script>
   function confirmDelete(packageId) {
        console.log('Delete function called for package ID:', packageId);

    if (confirm('Are you sure you want to delete this package?')) {
        document.getElementById('deleteForm').action = '{{ route('manage_package.destroy', '') }}/' + packageId;
        document.getElementById('deleteForm').submit();
    }
}

</script>


@endsection


