<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'name',
        'phone',
        'email',
    ];


    // relationships: user (belongsTo), address (belongsTo), products (hasMany), businessHours (hasMany)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
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
}
