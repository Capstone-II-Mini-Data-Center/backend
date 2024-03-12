<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Package;
use League\Csv\Writer;
use Illuminate\Http\Response;

class ReportExportController extends Controller
{
    public function exportCsv($reportType)
    {
        // Create a new CSV writer instance
        $csv = Writer::createFromString('');

        // Set the CSV header based on the report type
        if ($reportType === 'user_report') {
            $csv->insertOne(['User ID', 'User Name', 'Total Orders', 'Total Package']);

            $users = User::where('role', 'user')
                ->has('orders.order_details') 
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

            foreach ($users as $user) {
                $csv->insertOne([
                    $user->id,
                    $user->name,
                    $user->orders->count(),
                    $user->orders->flatMap->order_details->sum('package_count'),
                ]);
            }
            
            $totalUsers = $users->count();
            $csv->insertOne(['Total Users', '', $totalUsers, '']);
             
        } elseif ($reportType === 'package_report') {
            $csv->insertOne(['Package ID', 'Package Name', 'Total Sold', 'Unit Price', 'Total Price']);

            $packages = Package::withCount('order_details')
                ->get();

            foreach ($packages as $package) {
                 $orderDetailsCount = $package->order_details_count;
                if ($package->order_details_count > 0) {
                    $csv->insertOne([
                        $package->id,
                        $package->name,
                        $orderDetailsCount,
                        $package->price,
                        $orderDetailsCount * $package->price,
                    ]);
                }
            }

            $totalPackagesSold = $packages->sum('order_details_count');
            $csv->insertOne(['Total Packages Sold', '', $totalPackagesSold, 'Total Revenue','$' . number_format($packages->sum(function ($package) {
                return $package->order_details_count * $package->price;
            }), 2)]);
        } else {
            // Handle unsupported report type
            return response()->json(['error' => 'Unsupported report type'], 400);
        }

        // Set the response headers
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="report.csv"',
        ];

        // Return the CSV as a downloadable file
        return response($csv->output(), 200, $headers);
    }
}

