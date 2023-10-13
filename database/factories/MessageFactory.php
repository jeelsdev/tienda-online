<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word(),
            'body'=>$this->faker->sentence(10),
            'state'=>$this->faker->randomElement([0, 1]),
            'user_id'=>1,
        ];
    }
}
