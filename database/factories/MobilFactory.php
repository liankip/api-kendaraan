<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mb_mesin' => $this->faker->randomElement(['Silinder', 'Diesel']),
            'mb_kapasistas_penumpang' => $this->faker->randomElement([2, 4, 6]),
            'mb_tipe' => $this->faker->randomElement(['Convertible', 'Pick Up', 'Mini Bus'])
        ];
    }
}
