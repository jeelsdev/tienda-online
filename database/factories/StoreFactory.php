<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(),
            'logo'=>$this->faker->imageUrl(160, 260, 'profile'),
            'description'=>$this->faker->text(),
            'ruc'=>$this->faker->biasedNumberBetween(300, 1000),
            'user_id'=>User::role('staff')->inRandomOrder()->first()->id,
            'state_id'=>State::query()->inRandomOrder()->first()->id,
        ];
    }
}
