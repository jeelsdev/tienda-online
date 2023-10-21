<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'surnames' => $this->faker->lastName(),
            'birthday' => $this->faker->date(),
            'phone' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'profile'=>$this->faker->imageUrl(160, 260, 'profile'),
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // 12345678
            'remember_token' => Str::random(10),
            'address_id'=>Address::query()->inRandomOrder()->first()->id,
            'status_id'=>Status::query()->inRandomOrder()->first()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
