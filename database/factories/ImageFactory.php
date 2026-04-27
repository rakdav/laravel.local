<?php

namespace Database\Factories;

use Faker\Factory;

class ImageFactory extends Factory
{
    public function definition():array{
        return [
            'url'=>fake()->imageUrl()
        ];
    }
}
