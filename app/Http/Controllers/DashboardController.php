<?php

namespace App\Http\Controllers;
use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use Carbon\Carbon;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {   
        $usersWithOrdersCount = $this->countUsersWithOrders();
        $allPackagesCount = $this->countAllPackages();
        $allOrdersCount = $this->countAllOrders();
        $topPackagesData = $this->getTopPackagesData();
        $totalRevenue = $this->getTotalRevenue();

        $date = now()->toDateString();
        $totalRevenueData = $this->getTotalRevenueForDate($date);
        // $totalRevenueData = $this->getTotalRevenueForDate();
        return view('dashboard', compact('usersWithOrdersCount','allPackagesCount','allOrdersCount','topPackagesData','totalRevenue','totalRevenueData'));
    } 
    public function countUsersWithOrders()
    {
        $usersWithOrdersCount = User::has('orders')->count();

        return $usersWithOrdersCount;
    }

    public function countAllPackages()
    {
        $allPackagesCount = Package::count();

        return $allPackagesCount;
    }
    public function countAllOrders()
    {
        $allOrdersCount = OrderDetails::count();

        return $allOrdersCount;
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

    public function getTotalRevenueForDate($date)
    {
        $startOfDay = Carbon::parse($date)->startOfDay();
        $endOfDay = Carbon::parse($date)->endOfDay();

        $totalRevenueData = Orders::whereHas('order_details.package', function ($query) {
                $query->select('packages.id');
            })
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->with(['orderDetails.package'])
            ->get()
            ->sum(function ($order) {
                return $order->order_details->sum(function ($order_detail) {
                    return $order_detail->package->price * $order_detail->quantity;
                });
            });

        return $totalRevenueData;
    }

}

