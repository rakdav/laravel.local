<?php

namespace Database\Factories;

use App\Models\Review;
use Faker\Factory;

class ReviewFactory extends Factory
{
    protected function definition():array
    {
        return [
            'text'=>fake()->text(100),
            'rating'=>fake()->numberBetween(1,5),
        ];
    }
}
