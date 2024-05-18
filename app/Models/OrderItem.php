<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'order_id',
        'product_id',
        'product_image',
        'product_name',
        'quantity',
        'unit_price',
        'total_amount',
        'order_status',
        'item_delivery_date',
    ];

    // Eager loading: order, product
    // protected $with = ['order', 'product'];

    // relationships: order (belongsTo), product (belongsTo)
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
