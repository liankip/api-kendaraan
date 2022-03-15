<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(1)->create();
         Kendaraan::factory(20)->create();
         Motor::factory(20)->create();
         Mobil::factory(20)->create();
         Order::factory(40)->create();
    }
}
