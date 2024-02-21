<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-6xl bg-white mt-10 mb-10 ml-12 p-8">
            <div class="mb-4 rounded-lg shadow-lg py-3 px-5">
                <h1 class="text-2xl font-semibold mb-2" style="color: #3B82F6;">User Details</h1>
                <div class="ml-2">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
                </div>
            </div>

            @if ($user->orders->isEmpty())
                <p class="rounded-lg shadow-lg py-3 px-5">No orders for this user.</p>
            @else
                @foreach ($user->orders as $order)
                    <div class="mb-4 rounded-lg shadow-lg py-3 px-5">
                        <h2 class="text-xl font-semibold mb-2" style="color: #3B82F6;">Order ID: {{ $order->id }}</h2>
                        <table class="w-full mb-4 border border-collapse border-gray-300 rounded">
                            <thead>
                                <tr class="border bg-blue-100">
                                    <th class="py-2 px-4 border-b text-left">Package Name</th>
                                    <th class="py-2 px-4 border-b text-left">Unit Price</th>
                                    <th class="py-2 px-4 border-b text-left">Discount Amount</th>
                                    <th class="py-2 px-4 border-b text-left">Total Amount</th>
                                    <th class="py-2 px-4 border-b text-left">Plan</th>
                                    <th class="py-2 px-4 border-b text-left">Expired Date</th>
                                    <th class="py-2 px-4 border-b text-left">OS</th>
                                    <th class="py-2 px-4 border-b text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->order_details as $orderDetail)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $orderDetail->package->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $orderDetail->unit_price }}</td>
                                        <td class="py-2 px-4 border-b">{{ $orderDetail->discount_amount }}</td>
                                        <td class="py-2 px-4 border-b">{{ $orderDetail->total_amount }}</td>
                                        <td class="py-2 px-4 border-b">{{ $orderDetail->plan }}</td>
                                        <td class="py-2 px-4 border-b">{{ $orderDetail->expired_date }}</td>
                                        <td class="py-2 px-4 border-b">{{ $orderDetail->os }}</td>
                                        <td class="py-2 px-4 border-b">{{ $orderDetail->status }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="py-2 px-4 border-b">No order details for this order.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
