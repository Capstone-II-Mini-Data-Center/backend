<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        User::factory(1)->create();
        Package::factory(10)->create()->each(function ($package) {
            Banner::factory(1)->create(["package_id" => $package->id]);
        });
    }
}
