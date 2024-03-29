<?php
// ReportController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $reportType = $request->input('reportType', 'user_report');

        if ($reportType === 'user_report') {
            $users = User::where('role', 'user')
                ->has('orders.order_details') // Ensure users have orders with order details
                ->with([
                    'orders' => function ($query) {
                        $query->with([
                            'order_details' => function ($query) {
                                $query->select('order_id', \DB::raw('count(*) as package_count'))
                                    ->groupBy('order_id');
                            }
                        ]);
                    }
                ])
                ->get();

            $totalUsers = $users->count();

            return view('report.index', compact('users', 'totalUsers', 'reportType'));
        } elseif ($reportType === 'package_report') {
            $packages = Package::withCount('order_details')
                ->get();

            $totalPackagesSold = $packages->sum('order_details_count');

            return view('report.index', compact('packages', 'totalPackagesSold', 'reportType'));
        }

    }
}
