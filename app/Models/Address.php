<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'location_id',
        'address_line_one',
        'address_line_two',
        'city',
        'phone',
        'is_default',
    ];

    // Full Address Attribute
    public function getFullAddressAttribute(): string
    {
        return $this->address_line_one
            . ', ' . $this->address_line_two
            . ', ' . $this->city
            . ', ' . $this->location->state
            . ', ' . $this->location->pincode;
    }

    // relationships: user (belongsTo), location (belongsTo), store (hasOne), order (hasOne)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function store(): hasOne
    {
        return $this->hasOne(Store::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
