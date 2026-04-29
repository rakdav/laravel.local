<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition():array
    {
        return [
            'title'=>fake()->text(100),
            'rating'=>fake()->numberBetween(1,5),
        ];
    }
}
