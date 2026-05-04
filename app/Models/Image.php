<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Product|null $product
 * @property string|null $url
 */
class Image extends Model
{
    use HasFactory;
    protected $fillable = ['url'];
    public function products():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
