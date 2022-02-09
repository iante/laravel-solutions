<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Wallet::class;

    public function definition()
    {
        return [
            'main' => $this->faker->numerify('####'),
            'referral' => $this->faker->numerify('####'),
            'bonus' => $this->faker->numerify('####'),
        ];
    }
}
