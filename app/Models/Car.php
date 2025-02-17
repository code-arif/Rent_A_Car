<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name', 'brand', 'model', 'year', 'car_type', 'daily_rent_price', 'weekly_rent_price', 'status', 'availability', 'image'];

    //relation with car_details table
    public function detail(){
        return $this->hasOne(CarDetails::class);
    }

    // Relationship with Rental
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}

