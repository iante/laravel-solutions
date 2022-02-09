<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class userDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->name(),
            'Address' => $this->faker->text(),
            'State' => $this->faker->text(),
            'date_of_birth' => now(),
        ];
    }
}
