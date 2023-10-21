<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Status;
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
            'name'=>$this->faker->sentence(3),
            'logo'=>$this->faker->imageUrl(160, 260, 'profile'),
            'description'=>$this->faker->text(),
            'ruc'=>$this->faker->biasedNumberBetween(30000000, 1000000000),
            'user_id'=>User::role('staff')->inRandomOrder()->first()->id,
            'status_id'=>Status::whereIn('id', [1,2])->inRandomOrder()->first()->id,
        ];
    }
}
