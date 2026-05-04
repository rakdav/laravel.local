<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Image;
use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        if ($product->status == ProductStatus::Draft) {
            return response()->json(['message' => 'Product not found'], 404);
        };

        return [
            'id' => $product->id,
            'name'=>$product->name,
            'description'=>$product->description,
            'rating' => $product->rating(),
            'images' => $product->images->map(fn (Image $image) => $image->url),
            'price' => $product->price,
            'count' => $product->count,
            'reviews' => $product->reviews->map(fn (Review $review) => [
                'id' => $review->id,
                'userName' => $review->user->name,
                'text' => $review->title,
                'rating' => $review->rating,
            ]),
        ];
    }

}
