<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $selectedFilter = $request->input('dateFilter', 'year');
        $usersWithOrdersCount = $this->countUsersWithOrders();
        $allPackagesCount = $this->countAllPackages();
        $allOrdersCount = $this->countAllOrders();
        $topPackagesData = $this->getTopPackagesData();
        $totalRevenue = $this->getTotalRevenue();
        // $revenueData = $this->getOrderRevenueData($request->input('filter', 'year'));
        $revenueData = $this->generateMockRevenueData($request->input('dateFilter', 'year'));

        
        
// dd($revenueData);
// dd($revenueData);

        return view('dashboard', compact('usersWithOrdersCount', 'allPackagesCount', 'allOrdersCount', 'topPackagesData', 'totalRevenue','revenueData','selectedFilter'));
    }

    public function countUsersWithOrders()
    {
        return User::has('orders')->count();
    }

    public function countAllPackages()
    {
        return Package::count();
    }

    public function countAllOrders()
    {
        return OrderDetails::count();
    }

    public function getTopPackagesData()
    {
        $topPackagesData = OrderDetails::select('package_id', DB::raw('COUNT(package_id) as total'))
            ->groupBy('package_id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $labels = $topPackagesData->pluck('package_id')->map(function ($packageId) {
            return Package::find($packageId)->name;
        });

        $data = $topPackagesData->pluck('total');

        return compact('labels', 'data');
    }

    public function getTotalRevenue()
    {
        $packages = Package::withCount('order_details')->get();

        return $packages->sum(function ($package) {
            return $package->order_details_count * $package->price;
        });
    }
   



    private function generateMockRevenueData($filter)
    {
        // Mocking revenue data for demonstration
        $revenueData = [];
        $startDate = null;
        $endDate = null;

        switch ($filter) {
            case 'today':
                $startDate = now()->startOfDay();
                $endDate = now()->endOfDay();
                break;
            case 'this_month':
                $startDate = now()->startOfMonth();
                $endDate = now()->endOfMonth();
                break;
            case 'last_month':
                $startDate = now()->subMonth()->startOfMonth();
                $endDate = now()->subMonth()->endOfMonth();
                break;
            case 'six_months':
                $startDate = now()->subMonths(6)->startOfMonth();
                $endDate = now()->endOfMonth();
                break;
            case 'year':
            default:
                $startDate = now()->startOfYear();
                $endDate = now()->endOfYear();
                break;
        }

        

        // Generate random revenue data for each day within the selected range
        // for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
        //     $revenueData[$date->format('Y-m-d')] = rand(1000, 5000); // Random revenue value
        // }

        if ($filter === 'six_months' || $filter === 'year') {
        $start = $startDate->copy();
        while ($start->lte($endDate)) {
            $revenueData[$start->formatLocalized('%B %Y')] = rand(1000, 5000); // Random revenue value for the month
            $start->addMonth();
        }
        } else {
            // Generate random revenue data for each day within the selected range
            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                $revenueData[$date->format('Y-m-d')] = rand(1000, 5000); // Random revenue value for the day
            }
    }
        

        return $revenueData;
    }
    
}
