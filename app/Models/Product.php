<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $price
 * @property string|null $description
 * @property int|null $count
 * @property ProductStatus|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Image> $images
 * @property-read int|null $images_count
 * @property-read Collection<int, Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read User|null $user
 * @property int|null $product_id
 *
 * @method static ProductFactory factory($count = null, $state = [])
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCount($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereUserId($value)
 * @method static Builder|Review whereProductId($value)
 *
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'count',
        'price',
        'status'
    ];
    protected $casts = [
        'status' => ProductStatus::class
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function reviews():HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function rating(): int|float
    {
        return round($this->reviews->avg('rating'), 1);
    }
}
