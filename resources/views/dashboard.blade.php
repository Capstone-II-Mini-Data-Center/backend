
@extends('layouts.app')

@section('content')
    <div class="ml-12">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-semibold" style="color: #3B82F6;" >Welcome,  {{ $admins->name }}</h1>
        </div>
        <div class="flex flex-row justify-between text-bold text-white " >
            <div class="py-3 px-5 m-3 w-1/4 flex" style="background-color: #3B82F6;" >
                <div class="">
                    <div class="">
                        Total User
                    </div>
                    <div class="text-3xl">
                        {{ $usersWithOrdersCount }}
                    </div>
                </div>
                <div class="ml-10">
                    icons
                </div>
            </div>

            <div class="py-3 px-5 m-3 w-1/4 flex" style="background-color: #3B82F6;" >
                <div class="">
                    <div class="">
                        Total Package
                    </div>
                    <div class="text-3xl">
                        {{ $allPackagesCount }}
                    </div>
                </div>
                <div class="ml-10">
                    icons
                </div>
            </div>

            <div class="py-3 px-5 m-3 w-1/4 flex" style="background-color: #3B82F6;" >
                <div class="">
                    <div class="">
                        Total Order
                    </div>
                    <div class="text-3xl">
                        {{ $allOrdersCount }}
                    </div>
                </div>
                <div class="ml-10">
                    icons
                </div>
            </div>

            <div class="py-3 px-5 m-3 w-1/4 flex" style="background-color: #3B82F6;" >
                <div class="">
                    <div class="">
                        Total Revenue
                    </div>
                    <div class="text-3xl">
                         ${{ $totalRevenue }}
                    </div>
                </div>
                <div class="ml-10">
                    icons
                </div>
            </div>
           
        </div>

        <div class="flex">
            <div class="bg-blue-500 m-3 w-3/5 ">
                <div>
                    
                </div>
            </div>
            <div class=" w-2/5 m-3">
                <canvas id="topPackagesChart" width="350" height="340"></canvas></div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch top packages data from the controller
        let topPackagesData = @json($topPackagesData);

        // Chart.js configuration
        let ctx = document.getElementById('topPackagesChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: topPackagesData.labels,
                datasets: [{
                    data: topPackagesData.data,
                    backgroundColor: ['#0047ab', ' #006FB9', '#0096c7', '#48BBDB', ' #90E0EF'],
                }],
            },
            options: {
                title: {
                    display: true,
                    text: 'Top 5 Packages',
                },
            },
        });
    </script>
@endsection