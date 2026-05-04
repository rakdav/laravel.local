<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProductImage
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Product|null $product
 */
class ProductController extends Controller
{
    public function index(){
        $products = Product::query()->select(['id','name','price'])->
        whereStatus(ProductStatus::Published)->get();
        return $products->map(fn(Product $product)=>[
            'id'=>$product->id,
            'name' => $product->name,
            'price' => $product->price,
            'rating' => $product->rating(),
        ]);
    }
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
                'title' => $review->title,
                'rating' => $review->rating,
            ]),
        ];
    }
}
