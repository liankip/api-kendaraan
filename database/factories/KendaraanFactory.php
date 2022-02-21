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
        return [
            'kn_nama' => $this->faker->name(),
            'kn_warna' => $this->faker->colorName(),
            'kn_harga' => $this->faker->numberBetween(0, 100000000),
            'id_motor' => $this->faker->randomElement([1, 2, null]),
            'id_mobil' => $this->faker->randomElement([3, 2, 1, null])
        ];
    }
}
