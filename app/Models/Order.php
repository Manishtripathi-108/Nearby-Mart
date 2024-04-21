<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'no_of_items',
        'total_amount',
        'delivery_method',
    ];

    // relationships: user (belongsTo), orderItems (hasMany), payment (HasOne), address (belongsTo)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment(): HasOne
    {
        return $this->HasOne(Payment::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
