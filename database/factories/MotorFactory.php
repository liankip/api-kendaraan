<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MotorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mt_mesin' => $this->faker->randomElement(['1 silinder', 'in-line twin', 'tripel in-line']),
            'mt_tipe_suspensi' => $this->faker->randomElement(['Pararel Fork', 'Plunger Rear', 'Swing Arm Rear']),
            'mt_tipe_transmisi' => $this->faker->randomElement(['Constant', 'Syncron', 'Sliding'])
        ];
    }
}
