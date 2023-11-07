<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'image'=>'/storage/images/logos/'.$this->faker->image('public/storage/images/logos', 320, 200, null, false),
        ];
    }
}
