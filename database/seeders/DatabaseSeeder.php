<?php

namespace Database\Seeders;

use App\Models\{User, Rides, Reviews, Cars, Bookings, Messages, Notifications,Review,Payments};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            AdminSeeder::class,
            CountrySeeder::class,
            PolicySeeder::class,
            ReportSeeder::class,
            VechileSeeder::class,
        ]);
    }
}
