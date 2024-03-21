<!-- resources/views/reports/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-6xl bg-white mt-10 mb-10 ml-12">
            <div class="py-3 px-6 border-b-2">
                <div>
                    <h1 class="text-2xl font-semibold" style="color: #3B82F6;">Report Page</h1>
                </div>
            </div>
            <div class="flex justify-between">
                <div></div>
                <div class="flex items-center space-x-4 py-3 px-6">
                    <label for="reportType" class="text-lg">Select Report:</label>
                    <select id="reportType" class="border rounded-md p-2 w-48" onchange="location = this.value;">
                        <option value="{{ route('reports.index', ['reportType' => 'user_report']) }}" @if($reportType === 'user_report') selected @endif>User Report</option>
                        <option value="{{ route('reports.index', ['reportType' => 'package_report']) }}" @if($reportType === 'package_report') selected @endif>Package Report</option>
                    </select>
                    <div>
                        <button class="p-2 bg-green-300 rounded-md">
                            <a href="{{ route('reports.export', ['reportType' => $reportType]) }}">Export to CSV</a>
                        </button>
                </div>
            </div>
            </div>
            @if ($reportType === 'user_report')
                <!-- User Report -->
                <div class="shadow-lg rounded-xl px-5 py-5 border">
                    <table class="min-w-full rounded-lg overflow-hidden">
                        <thead class="text-blue-500 ">
                            <tr>
                                <th class="w-3/7 py-2 px-4 border-b text-center">No</th>
                                <th class="w-1/7 py-2 px-4 border-b text-center">User ID</th>
                                <th class="w-3/7 py-2 px-4 border-b text-center">User Name</th>
                                <th class="w-1/7 py-2 px-4 border-b text-center">Total Orders</th>
                                <th class="w-1/7 py-2 px-4 border-b text-center">Total Package Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $user->id }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $user->name }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $user->orders->count() }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        {{ $user->orders->sum(function($order) {
                                            return $order->order_details->sum('package_count');
                                        }) }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="border-b-2">
                                <td colspan="2" class="py-2 px-4 text-center font-semibold">Total Users</td>
                                <td colspan="2" class="py-2 px-4 text-center font-semibold">
                                    {{ $users->count() }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @elseif ($reportType === 'package_report')
                <!-- Package reports -->
                <div class="shadow-lg rounded-xl px-5 py-5 border">
                    <table class="min-w-full rounded-lg overflow-hidden">
                        <thead class="text-blue-500 ">
                            <tr>
                                <th class="w-3/7 py-2 px-4 border-b text-center">No</th>
                                <th class="w-1/7 py-2 px-4 border-b text-center">Package ID</th>
                                <th class="w-3/7 py-2 px-4 border-b text-center">Package Name</th>
                                <th class="w-1/7 py-2 px-4 border-b text-center">Total Sold</th>
                                <th class="w-1/7 py-2 px-4 border-b text-center">Unit Price</th>
                                <th class="w-1/7 py-2 px-4 border-b text-center">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packages as $package)
                                @if($package->order_details_count > 0)
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $package->id }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $package->name }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $package->order_details_count }}</td>
                                        <td class="py-2 px-4 border-b text-center">${{ $package->price }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            ${{ number_format($package->order_details_count * $package->price, 2)  }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td colspan="2" class="py-2 px-4 border-b text-center font-semibold">Total Packages Sold</td>
                                <td class="py-2 px-4 border-b text-center font-semibold">{{ $totalPackagesSold }}</td>
                                <td colspan="2" class="py-2 px-4 border-b text-center font-semibold">Total Revenue</td>
                                <td class="py-2 px-4 border-b text-center font-semibold">$
                                    {{ $packages->sum(function($package) {
                                        return $package->order_details_count * $package->price;
                                    }) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
