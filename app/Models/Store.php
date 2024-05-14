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


    // relationships: user (belongsTo), address (belongsTo), products (hasMany), businessHours (hasMany), orderItems (hasManyThrough)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function addresses(): BelongsTo
    {
        return $this->belongsTo(Address::class);
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
        return $this->hasManyThrough(OrderItem::class, Product::class);
    }
}
