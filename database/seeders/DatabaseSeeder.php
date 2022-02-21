<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Motor;
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
         Kendaraan::factory(5)->create();
         Motor::factory(3)->create();
         Mobil::factory(3)->create();
    }
}
