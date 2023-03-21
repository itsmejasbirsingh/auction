<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bid;

class Auction extends Model
{
    use HasFactory;

    public function sim()
    {
        return $this->belongsTo(Sim::class);
    }

    public function activation()
    {
        return $this->belongsTo(Activation::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function capacity()
    {
        return $this->belongsTo(Capacity::class);
    }

    public function colors()
    {
        return $this->hasMany(AuctionColor::class);
    }

    public function havingColor($color_id)
    {
        return $this->hasOne(AuctionColor::class)->where('color_id', $color_id)->first();
    }

    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class);
    }

    public function myBid()
    {
        return $this->hasOne(Bid::class)->where('user_id', auth()->user()->id);
    }

    public function myWinningStatus()
    {
        // Whether current user has placed a bid or not.
        $myBidCounts = Bid::where('auction_id', $this->id)->where('user_id', auth()->user()->id)->where('usd', '>', 0)->count();

        if ($myBidCounts === 0)
            return '';

        // First Highest bid.
        $highestBid = Bid::where('auction_id', $this->id)->where('usd', '>', 0)->orderByDesc('usd')->first();

        // Second highest bid.
        $secondHighestBid = Bid::where('auction_id', $this->id)->where('usd', '>', 0)->orderByDesc('usd')->offset(1)->limit(1)->first();

        if ($highestBid && $highestBid->user_id === auth()->user()->id)
            return 'Winning';

        if ($secondHighestBid && $secondHighestBid->user_id === auth()->user()->id)
            return 'About to win';

        return 'Losing';
    }
}