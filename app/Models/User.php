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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    // Eager loading: userDetail
    protected $with = ['userDetail'];


    // The name attribute should be capitalized
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
            set: fn (string $value) => ucwords($value)
        );
    }

    // relationships: userDetail (hasOne), carts (hasMany), stores (hasMany), orders (hasMany), 
    // feedbackRating (hasMany), addresses (hasMany)
    public function userDetail(): HasOne
    {
        return $this->hasOne(UserDetail::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class)->where('user_type', 'store owner');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function feedbackRating(): HasMany
    {
        return $this->hasMany(FeedbackRating::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    // relationship: products (belongsToMany) many to many relationship to products
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'carts')->withPivot('quantity');
    }

    // relationship: orderProducts (hasManyThrough) one to many relationship to orderProducts
    public function orderItems(): HasManyThrough
    {
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }
}
