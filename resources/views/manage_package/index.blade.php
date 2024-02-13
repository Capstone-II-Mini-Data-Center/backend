@extends('layouts.app')

@section('content')
  <div class="flex justify-between">
    <!-- Main Content -->
    <div class="w-6/7 bg-white mr-10 ml-10">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-semibold"></h1>
            <a href="{{ route('manage_package.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Package</a>
        </div>
        <div class="">
            
        </div>
        <div class="shadow-lg rounded-xl">
            <table class="min-w-full border border-collapse rounded-lg overflow-hidden">
                <thead class="text-blue-500 border border-2">
                    <tr>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Name</th>
                        <th class="w-2/7 py-2 px-4 border-b text-center">Description</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Price</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">CPU</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Memory</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Storage</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Recommended</th>
                        <th class="w-2/7 py-2 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead
                <tbody>
                    @foreach($packages as $index => $package)
                        <tr class="border border-2">
                            <td class="py-2 px-4 border-b text-center">{{ $package->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $package->description }}</td>
                            <td class="py-2 px-4 border-b text-center">${{ number_format($package->price, 2) }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->cpu }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->memory }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->storage }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->recommended? 'Yes' : 'No' }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <a href="{{ route('manage_package.edit', $package->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form id="deleteForm" action="{{ route('manage_package.destroy', $package->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete('{{ $package->id }}')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>

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


