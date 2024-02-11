<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\ServerCred;
use App\Models\User;
use App\Models\Banner;
use App\Models\Package;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Package::factory(10)->create();
        // User::factory(5)->create()->each(function ($user){
        //     $packageCount = rand(1, 10);
        //     $packages = Package::inRandomOrder()->take($packageCount)->pluck("id")->toArray();

        //     foreach($packages as $packageId)
        //     {
        //         PackageUser::factory()->create([
        //             "user_id" => $user->id,
        //             "package_id" => $packageId
        //         ]);
        //     }
        // });

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create 1 admin user and 2 random user
        User::factory(1)->admin()->create();
        User::factory(2)->create();
        $users = User::all();

        // Create 10 packages and each package has one banner
        $packages = Package::factory(10)->create([])->each(function ($package) {
            Banner::factory(1)->create(["package_id" => $package->id]);
        });

        Orders::factory(5)->create(["user_id" => $users->random()->id])->each(function ($order) use ($packages) {
            $package = Package::where("id", $packages->random()->id)->first();
            $order->orderDetails()->saveMany(OrderDetails::factory(2)->create([
                'package_id' => $package->id,
                'package_name' => $package->name,
                'orders_id' => $order->id,
            ])->each(function ($order_detail) {
            ServerCred::factory(1)->create(["order_detail_id" => $order_detail->id]);
            }));
        });
    }
}
