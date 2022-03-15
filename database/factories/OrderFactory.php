<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
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
            'nama_kendaraan' => $faker->vehicle,
            'tipe_kendaraan' => $this->faker->boolean,
            'warna_kendaraan' => $this->faker->colorName(),
            'harga_kendaraan' => $this->faker->numberBetween(0, 100000000),
            'subtotal' => $this->faker->numberBetween(0, 100000000),
            'quantity' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->numberBetween(0, 100000000)
        ];
    }
}
