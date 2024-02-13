<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-6xl bg-white mt-10 mb-10 ml-12">
            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-semibold"></h1>
            </div>
            <div class="shadow-lg rounded-xl">
                <table class="min-w-full border border-collapse rounded-lg overflow-hidden">
                    <thead class="text-blue-500 border border-2">
                        <t>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Order ID</th>
                            <th class="w-2/7 py-2 px-4 border-b text-center">Total Amount</th>
                            <th class="w-2/7 py-2 px-4 border-b text-center">Status</th>
                            <th class="w-2/7 py-2 px-4 border-b text-center">Update Status</th>
                            <th class="w-1/7 py-2 px-4 border-b text-center">Action</th>
                        </>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="border border-2">
                                <td class="py-2 px-4 border-b text-center">{{ $order->id }}</td>
                                <td class="py-2 px-4 border-b text-center">${{ number_format($order->total_amount, 2) }}</td>
                                <td class="py-2 px-4 border-b text-center">
                                    <span id="status_{{ $order->id }}">{{ $order->status }}</span>
                                </td>
                                <td class="py-2 px-4 border-b text-center">
                                    <form id="updateForm_{{ $order->id }}" action="{{ route('manage_order.update-status', $order->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select name="status" class="border rounded-md py-1 px-2 w-3/5" onchange="confirmUpdateStatus('{{ $order->id }}', this.value)">
                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="in progress" {{ $order->status === 'in progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="expired" {{ $order->status === 'expired' ? 'selected' : '' }}>Expired</option>
                                        </select> 
                                    </form>
                                </td>
                                <td class="py-2 px-4 text-center flex justify-center items-center">
                                    <a href="{{ route('manage_order.show', $order->id) }}" class="text-blue-500 hover:text-blue-300 mr-2">
                                        <div class="flex justify-center items-center">
                                            <div class="ml-3 ">
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

    <script>
        function confirmUpdateStatus(orderId, selectedStatus) {
            var confirmation = confirm('Are you sure you want to update the status to ' + selectedStatus + '?');

            if (confirmation) {
                document.getElementById('status_' + orderId).innerText = selectedStatus;
                document.getElementById('updateForm_' + orderId).submit();
            }
        }
    </script>
@endsection
