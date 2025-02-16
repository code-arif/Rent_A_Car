<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'car_id',
        'name',
        'phone',
        'start_date',
        'end_date',
        'total_cost',
        'status',
        'pickup_location',
        'drop_off_location',
        'pickup_time',
        'drop_off_time',
    ];

    //relation with user table
    public function user() {
        return $this->belongsTo(User::class);
    }

    //relation with car table
    public function car() {
        return $this->belongsTo(Car::class);
    }
}
