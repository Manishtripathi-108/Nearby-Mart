<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // relationships: userDetail (hasOne), carts (hasMany), stores (hasMany), 
    // orders (hasMany), feedbackRating (hasMany), addresses (hasMany)
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class)->where('user_type', 'store_owner');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function feedbackRating()
    {
        return $this->hasMany(FeedbackRating::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
