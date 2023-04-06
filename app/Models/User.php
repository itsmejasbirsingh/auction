<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordInterface;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable implements CanResetPasswordInterface
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    protected $guarded = ['password_confirmation'];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function shipCountry()
    {
        return $this->belongsTo(Country::class);
    }

    public function verificationStatus()
    {
        return $this->is_verified ? 'Yes' : 'No';
    }

    public function myBiddings()
    {
        return $this->hasMany(Bid::class)->join('auctions', function ($join) {
            $join->on('bids.auction_id', '=', 'auctions.id');
        })->where('bids.user_id', auth()->user()->id)->where('auctions.closing_date', '>=', \Carbon\Carbon::now());
    }
}