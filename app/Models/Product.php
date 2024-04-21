<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'photo_main',
        'photo_1',
        'photo_2',
        'name',
        'rating',
        'price',
        'discount',
        'discount_type',
        'availability',
        'description',
        'stock',
        'units_sold',
        'measure',
        'sold_by',
    ];

    // relationships: store (belongsTo), orderItems (hasMany), carts (hasMany), feedbackRatings (hasMany)
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
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
