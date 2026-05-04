<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;


/**
 * App\Models\Review
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $products_id
 * @property string|null $title
 * @property int|null $rating
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Product> $products
 * @property-read int|null $products_count
 * @property-read User|null $user
 */

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'rating'
    ];
    protected $casts = ['rating' => 'int'];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function products():BelongsToMany{
        return $this->belongsToMany(Product::class);
    }
}
