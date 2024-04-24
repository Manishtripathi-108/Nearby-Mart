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

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
