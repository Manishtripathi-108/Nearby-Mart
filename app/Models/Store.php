<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Store extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'address_id',
        'name',
        'phone',
        'email',
    ];

    // Eager loading: products, businessHours
    // protected $with = ['products', 'businessHours'];

    // check if the store is open
    public function isOpen(): bool
    {
        $day = now()->format('l');
        $time = now()->format('H:i:s');

        $businessHour = $this->businessHours()->where('day', $day)->first();

        if (!$businessHour) {
            return false;
        }

        return $time >= $businessHour->open_time && $time <= $businessHour->close_time;
    }

    // relationships: user (belongsTo), address (belongsTo), products (hasMany), businessHours (hasMany), orderItems (hasManyThrough)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function storeAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function businessHours(): HasMany
    {
        return $this->hasMany(BusinessHour::class);
    }

    public function orderItems(): HasManyThrough
    {
        return $this->hasManyThrough(
            OrderItem::class,
            Product::class,
            'store_id',
            'product_id',
            'id',
            'id'
        );
    }
}
