<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;


    protected $fillable = [
        'from',
        'to'
    ];

    public function bookable(){
        return $this -> belongsTo(Bookable::class);
    }

    public function review(){
        return $this -> hasOne(Review::class);
    }

    public function scopeBetweenDates(Builder $query, $from , $to){
        return $query -> where('to', '>=', $from) -> where('from', '<=', $to);
    }

    public static function findByReviewKay(String $key): ?Booking {
        return static::where('review_key', $key) -> with('bookable') -> first();
    }

    public static function boot(){
        parent::boot();

        static::creating(function ($booking){
            $booking -> review_key = Str::uuid();
        });
    }


}
