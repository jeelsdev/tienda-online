<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'=>$this->faker->text(),
            'response'=>$this->faker->sentence(10),
            'user_id'=>User::role(['staff', 'client'])->inRandomOrder()->first()->id,
        ];
    }
}
