<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run():void{
        User::factory(5)
            ->has(
                Product::factory(3)
                    ->has(Image::factory(rand(1, 4)), 'images')
                    ->has(
                        Review::factory(rand(0, 10))->for(User::factory()),
                        'reviews'
                    )
            )
            ->create([
                'is_admin' => true
            ]);
    }
}
