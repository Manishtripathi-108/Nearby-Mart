<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'profile_picture',
        'dob',
        'phone',
        'user_type',
    ];

    // relationships: user (belongsTo)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
