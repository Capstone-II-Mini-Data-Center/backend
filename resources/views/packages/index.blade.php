@extends('layouts.app')

@section('content')
  <div class="flex justify-between">
    <!-- Main Content -->
      <div class="w-full bg-white mr-5 ml-10 relative">
          <div class="">
              <div class="flex justify-between px-6 py-3 border-b-2">
                  <h1 class="text-2xl font-semibold" style="color: #3B82F6;">Package Page</h1>
                  <a href="{{ route('packages.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Package</a>
            </div>
              <div class="flex justify-between py-3 px-6">
                  <div></div>
                  <form action="{{ route('packages.search') }}" method="GET">
                      <div class="relative flex items-center w-52 ">
                            <input
                            type="text"
                            name="name"
                            id="search"
                            class="mt-1 p-2 border border-gray-400 rounded-md w-full pl-10 flex items-center"
                            placeholder="Search Package"
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
          <div class="shadow-lg rounded-xl px-5 py-5 border">
              <table class="w-full rounded-lg overflow-hidden">
                  <thead class="text-blue-500 ">
                    <tr>
                        <th class="w-3/7 py-2 px-4 border-b text-center">No</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Name</th>
                        <!-- <th class="w-2/7 py-2 px-4 border-b text-center">Description</th> -->
                        <th class="w-1/7 py-2 px-4 border-b text-center">Price</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">CPU</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Memory</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Storage</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Recommended</th>
                        <th class="w-1/7 py-2 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $index => $package)
                        <tr>
                            <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->name }}</td>
                            <!-- <td class="py-2 px-4 border-b">{{ $package->description }}</td> -->
                            <td class="py-2 px-4 border-b text-center">${{ number_format($package->price, 2) }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->cpu }} VCN</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->memory }} GB</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->storage }} GB</td>
                            <td class="py-2 px-4 border-b text-center">{{ $package->recommended? 'Yes' : 'No' }}</td>
                            <td class="py-2 px-4 border-b text-center flex flex-row items-center justify-center">
                                <a href="{{ route('packages.edit', $package->id) }}" class="mr-3" title="Edit">
                                    <i class="fas fa-edit" style="color: blue;"></i>
                                </a>
                                <form id="deleteForm" action="{{ route('packages.destroy', $package->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete('{{ $package->id }}')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('packages.show', $package->id) }}" class=" text-blue-501 mr-2">
                                    <div class=" flex justify-center items-center ml-3 mt-1" title="View Detail">
                                            <i class="fa-regular fa-file-lines" style="color: blue;"></i>
                                        </div>
                                    </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex p-3 justify-between">
                <div></div>
                <div>
                    @if ($packages->hasPages())
                    <ul class="pagination">
                            @if ($packages->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $packages->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($packages->getUrlRange(1, $packages->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $packages->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endforeach

                            @if ($packages->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $packages->nextPageUrl() }}">&raquo;</a></li>
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
</div>

<script>
   function confirmDelete(packageId) {
        console.log('Delete function called for package ID:', packageId);

    if (confirm('Are you sure you want to delete this package?')) {
        document.getElementById('deleteForm').action = '{{ route('packages.destroy', '') }}/' + packageId;
        document.getElementById('deleteForm').submit();
    }
}

</script>


@endsection


