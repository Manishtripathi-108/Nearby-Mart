<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackRating extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
    ];

    // relationships: user (belongsTo), order (belongsTo), product (belongsTo)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
