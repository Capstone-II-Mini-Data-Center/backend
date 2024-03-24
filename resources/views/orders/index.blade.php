<!-- resources/views/orders/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-6xl bg-white mt-10 mb-10 ml-12">
            <div  class="py-3 px-6 border-b-2">
                <div>
                    <h1 class="text-2xl font-semibold" style="color: #3B82F6;">List Order</h1>
                </div>
            </div>
            <div class="flex justify-between items-center px-6 py-3">
                <div>
                    <form method="get" action="{{ route('orders.index') }}" id="dateForm">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative flex items-center">
                                <label for="start_date" class="mr-2">From:</label>
                                <input type="date" name="start_date" id="start_date" class="rounded-lg p-2 border border-gray-400">
                            </div>
                            <div class="relative flex items-center">
                                <label for="end_date" class="mr-2">To:</label>
                                <input type="date" name="end_date" id="end_date" class="rounded-lg p-2 border border-gray-400">
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <form method="get" action="{{ route('orders.index') }}">
                        <select name="status" onchange="this.form.submit()" class="rounded-lg w-32">
                            <option value="">All Status</option>
                            <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in progress" {{ $status === 'in progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="delivered" {{ $status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="expired" {{ $status === 'expired' ? 'selected' : '' }}>Expired</option>
                        </select>
                    </form>
                </div>
                <div>
                    <form method="get" action="{{ route('orders.index') }}">
                        <div class="flex">
                            <div class="relative flex items-center">
                                <select name="plan" class="rounded-lg p-2 border border-gray-400 w-full flex items-center w-32">
                                    <option value="" {{ $plan === '' ? 'selected' : '' }}>All Plans</option>
                                    <option value="plan1" {{ $plan === 'plan1' ? 'selected' : '' }}>1month</option>
                                    <option value="plan2" {{ $plan === 'plan2' ? 'selected' : '' }}>3months</option>
                                    <option value="plan3" {{ $plan === 'plan3' ? 'selected' : '' }}>6months</option>
                                    <option value="plan4" {{ $plan === 'plan4' ? 'selected' : '' }}>12months</option>
                                </select>
                                <button type="submit" class="flex items-center absolute inset-y-0 right-0 px-4 py-2 rounded-md ">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <form method="get" action="{{ route('orders.index') }}">
                        <div class="relative flex items-center">
                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="border border-gray-400 rounded-md w-full pl-3 flex items-center"
                                placeholder="Search"
                                value="{{ $username }}"
                                autocomplete="off"
                            >
                            <button type="submit" class="flex items-center absolute inset-y-0 right-0 px-4 py-2 rounded-md">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                    </form>
                </div>
                <div class="flex items-center">
                    <form method="get" action="{{ route('orders.reset-filters') }}">
                        <button type="submit" class="bg-blue-400 hover:bg-green-300 p-2 rounded-md">Reset</button>
                    </form>
                </div>
            </div>

            <div class="shadow-lg rounded-xl px-5 py-5 border">
                <table class="min-w-full rounded-lg overflow-x-auto">
                    <thead class="text-blue-500">
                        <tr>
                            <th class="w-2/7 py-2 px-4 border-b text-center">No</th>
                            <th class="w-2/7 py-2 px-4 border-b text-center">User</th>
                            <th class="w-2/7 py-2 px-4 border-b text-center">Package Name</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Unit Price</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Discount Amount</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Total Amount</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Plan</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Expired Date</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">OS</th>
                            <!-- <th class="w-1/7 py-2 px-4 border-b text-center">Status</th> -->
                            <th class="w-1/7 py-2 px-4 border-b text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderDetails as $detail)
                            <tr class="">
                                <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ optional($detail->order->user)->name }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $detail->package_name }}</td>
                                <td class="py-2 px-4 border-b text-center">${{ number_format($detail->unit_price, 2) }}</td>
                                <td class="py-2 px-4 border-b text-center">${{ number_format($detail->discount_amount, 2) }}</td>
                                <td class="py-2 px-4 border-b text-center">${{ number_format($detail->total_amount, 2) }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $detail->plan }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $detail->expired_date }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $detail->os }}</td>
                                <!-- <td class="py-2 px-4 border-b text-center">{{ $detail->status }}</td> -->
                                <td class="py-2 px-4 border-b text-center">
                                    <form action="{{ route('orders.update-status', $detail->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select name="status" onchange="this.form.submit()" class="rounded-lg w-32">
                                            @if ($detail->status === 'pending')
                                                <option value="pending">Pending</option>
                                                <option value="in progress">In Progress</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="expired">Expired</option>
                                            @elseif ($detail->status === 'in progress')
                                                <option value="in progress">In Progress</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="expired">Expired</option>
                                            @elseif ($detail->status === 'delivered')
                                                <option value="deliver">Delivered</option>
                                                <option value="expired">Expired</option>
                                            @else
                                                <!-- Default option when status is expired -->
                                                <option value="expired" selected>Expired</option>
                                            @endif
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex p-3 justify-between">
                    <div></div>
                    <div>
                        @if ($orderDetails->hasPages())
                        <ul class="pagination">
                            @if ($orderDetails->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $orderDetails->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($orderDetails->getUrlRange(1, $orderDetails->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $orderDetails->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endforeach

                            @if ($orderDetails->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $orderDetails->nextPageUrl() }}">&raquo;</a></li>
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
    document.getElementById('end_date').addEventListener('change', function() {
        document.getElementById('dateForm').submit();
    });
</script>
@endsection

