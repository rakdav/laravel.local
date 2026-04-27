<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use Carbon\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'=>fake()->sentence(),
            'description'=>fake()->text(),
            'price'=>fake()->numberBetween(1000, 10000),
            'count'=>fake()->randomNumber(2),
            'status'=>fake()->randomElement([ProductStatus::Draft,
                ProductStatus::Published])
        ];
    }
}
