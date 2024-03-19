
@extends('layouts.app')

@section('content')
    <div class="ml-12">
        <div id="csrfToken" data-token="{{ csrf_token() }}"></div>

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-semibold" style="color: #3B82F6;" >Welcome,  {{ $admins->name }}</h1>
        </div>
        <div class="flex flex-row justify-between text-bold" style="color: #3B82F6;" >
            <div class="py-3 px-3 m-3 w-1/4 flex justify-between shadow-lg rounded-lg" style="background-color: #FFFFFF;" >
                <div>
                    <div class="">
                        Total User
                    </div>
                    <div class="text-4xl">
                        {{ $usersWithOrdersCount }}
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="material-symbols-outlined"  style="font-size: 50px;">
                        supervisor_account
                    </span>
                </div>
            </div>

            <div class="py-3 px-3 m-3 w-1/4 flex justify-between shadow-lg rounded-lg"  style="background-color: #FFFFFF;" >
                <div>
                    <div>
                        Total Package
                    </div>
                    <div class="text-4xl">
                        {{ $allPackagesCount }}
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="material-symbols-outlined" style="font-size: 50px;">
                        box
                    </span>
                </div>
            </div>

            <div class="py-3 px-3 m-3 w-1/4 flex shadow-lg rounded-lg justify-between" style="background-color: #FFFFFF;" >
                <div>
                    <div>
                        Total Order
                    </div>
                    <div class="text-4xl">
                        {{ $allOrdersCount }}
                    </div>
                </div>
                <div class="flex items-center" >
                    <span class="material-symbols-outlined"  style="font-size: 50px; ">
                        local_mall
                    </span>
                </div>
            </div>

            <div class="py-3 px-3 m-3 w-1/4 flex justify-between shadow-lg rounded-lg" style="background-color: #FFFFFF;" >
                <div>
                    <div>
                        Total Revenue
                    </div>
                    <div class="text-4xl">
                         ${{ $totalRevenue }}
                    </div>
                </div>
                <div class="ml-5 flex items-center">
                    <span class="material-symbols-outlined"  style="font-size: 50px;">
                        monetization_on
                    </span>
                </div>
            </div>
           
        </div>

        <div class="">
            <div class="p-10 shadow-xl">
                <div>
                    <label for="dateFilter"">Select Date:</label>
                    <select id="dateFilter" class="rounded-lg ml-3">
                        <option value="today" @if($selectedFilter == 'today') selected @endif>Today</option>
                        <option value="this_month" @if($selectedFilter == 'this_month') selected @endif>This Month</option>
                        <option value="last_month" @if($selectedFilter == 'last_month') selected @endif>Last Month</option>
                        <option value="six_months" @if($selectedFilter == 'six_months') selected @endif>Last 6 Months</option>
                        <option value="year" @if($selectedFilter == 'year') selected @endif>This Year</option>
                    </select>
                </div>
                <div>
                    <canvas id="revenueChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class=" w-3/6 mt-5 shadow-xl py-10">
                <canvas id="topPackagesChart" width="350" height="340"></canvas></div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

    <script>
        let revenueData = @json($revenueData);
        let topPackagesData = @json($topPackagesData);

        // Create revenue chart
        (function () {
            let ctx = document.getElementById('revenueChart').getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Object.keys(revenueData),
                    datasets: [{
                        label: 'Total Revenue',
                        data: Object.values(revenueData),
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            // Add event listener for filter change
            document.getElementById('dateFilter').addEventListener('change', function () {
                let selectedFilter = this.value;
                window.location.href = "{{ route('dashboard') }}?dateFilter=" + selectedFilter;
            });
        })();

        // Create top packages chart
        (function () {
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
                        fontColor: '#3B82F6', 
                        fontSize: 18, 
                        fontStyle: 'bold',
                        lineHeight: 2,
                    },
                },
            });
        })();
</script>
@endsection