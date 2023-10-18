<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'description'=>$this->faker->text(),
            'price'=>$this->faker->randomFloat(3, 10, 500),
            'amount'=>$this->faker->randomNumber(2),
            'image'=>$this->faker->imageUrl(640, 480, 'product'),
            'status_id'=>$this->faker->randomElement([1, 2]),
            'store_id'=>Store::query()->inRandomOrder()->first()->id,
            'category_id'=>Category::query()->inRandomOrder()->first()->id,
        ];
    }
}
