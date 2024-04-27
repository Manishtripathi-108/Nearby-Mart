<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\ValidationException;

class BusinessHour extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'store_id',
        'day',
        'open_time',
        'close_time',
    ];

    // Define boot method to attach model event listeners
    protected static function boot()
    {
        parent::boot();

        // Attach a creating event listener to ensure unique days per store
        static::creating(function ($businessHour) {
            if (self::where('store_id', $businessHour->store_id)->where('day', $businessHour->day)->exists()) {
                throw ValidationException::withMessages(['day' => 'The day already exists for this store.']);
            }
        });
    }


    // relationships: store (belongsTo)
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
