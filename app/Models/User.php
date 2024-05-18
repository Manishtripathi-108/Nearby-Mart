<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // The attributes that are mass assignable.
    protected $fillable = [
        'profile_picture',
        'name',
        'dob',
        'phone',
        'user_type',
        'email',
        'password',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast.
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // The name attribute should be capitalized
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => ucwords($value)
        );
    }

    // Define boot method to attach model event listeners
    protected static function boot()
    {
        parent::boot();

    }

    // Define a method to check if the user is a store owner
    public function isStoreOwner(): bool
    {
        return ($this->user_type === 'Store Owner' || $this->user_type === 'Admin');
    }


    // Extra Relationship: products (belongsToMany) many to many relationship to products
    public function productsInCart(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'carts')->withPivot('quantity');
    }

    // Extra Relationship: orderProducts (hasManyThrough) one to many relationship to orderProducts
    public function orderItems(): HasManyThrough
    {
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }

    // relationships: carts (hasMany), stores (hasMany), orders (hasMany), 
    // feedbackRating (hasMany), addresses (hasMany)
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function feedbackRatings(): HasMany
    {
        return $this->hasMany(FeedbackRating::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
