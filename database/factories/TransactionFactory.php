<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::role('client')->inRandomOrder()->first()->id,
            'store_id'=>Store::query()->inRandomOrder()->first()->id,
            'product_id'=>Product::query()->inRandomOrder()->first()->id,
            'amount'=>$this->faker->randomNumber(2),
            'pay'=>$this->faker->randomFloat(3, 10, 100),
        ];
    }
}
