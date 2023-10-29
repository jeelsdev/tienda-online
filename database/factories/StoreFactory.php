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
            'logo'=>'/storage/images/logos/'.$this->faker->image('public/storage/images/logos/',160,260, null, false),
            'description'=>$this->faker->text(),
            'ruc'=>$this->faker->biasedNumberBetween(3000000000, 100000000000),
            'user_id'=>$this->faker->numberBetween(2, 11),
            'status_id'=>Status::whereIn('id', [1,2])->inRandomOrder()->first()->id,
        ];
    }
}
