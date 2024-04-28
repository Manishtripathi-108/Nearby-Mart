<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'area',
        'pincode',
        'district',
        'state',
        'latitude',
        'longitude',
    ];

    // relationships: address (hasMany)
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
