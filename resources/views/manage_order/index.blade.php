<!-- resources/views/manage_order/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-6xl bg-white mt-10 mb-10 ml-12">
            <div class="flex justify-between mb-4">
            </div>
            <div class="shadow-lg rounded-xl">
                <table class="min-w-full border border-collapse rounded-lg overflow-hidden">
                    <thead class="text-blue-500 border border-2 ">
                        <tr>
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
                                <td class="py-2 px-4 border-b text-center">{{ $detail->package_name }}</td>
                                <td class="py-2 px-4 border-b text-center">${{ number_format($detail->unit_price, 2) }}</td>
                                <td class="py-2 px-4 border-b text-center">${{ number_format($detail->discount_amount, 2) }}</td>
                                <td class="py-2 px-4 border-b text-center">${{ number_format($detail->total_amount, 2) }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $detail->plan }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $detail->expired_date }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $detail->os }}</td>
                                <!-- <td class="py-2 px-4 border-b text-center">{{ $detail->status }}</td> -->
                                <td class="py-2 px-4 border-b text-center">
                                    <form action="{{ route('manage_order.update-status', $detail->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select name="status" onchange="this.form.submit()" class="rounded-lg">
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
            </div>
        </div>
    </div>

@endsection

