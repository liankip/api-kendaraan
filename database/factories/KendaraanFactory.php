<?php

namespace Database\Factories;

use App\Models\Mobil;
use App\Models\Motor;
use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        return [
            'kn_nama' => $faker->vehicle,
            'kn_warna' => $this->faker->colorName(),
            'kn_harga' => $this->faker->numberBetween(0, 100000000),
            'kendaraanable_id' => rand(1, 20),
            'kendaraanable_type' => rand(0, 1) == 1 ? 'App\Models\Motor' : 'App\Models\Mobil',
        ];
    }
}
