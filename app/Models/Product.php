<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'store_id',
        'category_id',
        'photo_main',
        'photo_1',
        'photo_2',
        'name',
        'rating',
        'price',
        'discount',
        'discount_type',
        'available',
        'description',
        'stock',
        'units_sold',
        'measure',
        'sold_by',
    ];

    // Eager loading: store, feedbackRatings
    protected $with = ['store', 'feedbackRatings'];

    // relationships: store (belongsTo), category (belongsTo), hasMany (orderItems, carts, feedbackRatings)
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function OrderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function feedbackRatings(): HasMany
    {
        return $this->hasMany(FeedbackRating::class);
    }
}
