<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'day',
        'open_time',
        'close_time',
    ];


    // relationships: store (belongsTo)
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
