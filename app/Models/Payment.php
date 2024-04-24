<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'payment_status',
        'completed_date',
    ];

    // Eager loading: order
    protected $with = ['order'];

    // relationships: order (belongsTo)
    public function order(): BelongsTo
    {
        return $this->BelongsTo(Order::class);
    }
}
