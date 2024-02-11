<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                "name" => "Admin",
                "email" => "cloudbloc@gmail.com",
                "phone_number" => "011222333",
                "password" => Hash::make('12345678'),
                "role" => "admin",
                'email_verified_at' => now(),
            ]
        );
    }
}
