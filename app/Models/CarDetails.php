<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDetails extends Model
{
    protected $fillable = ['car_id', 'seats', 'fuel_type', 'transmission', 'mileage', 'air_conditioning', 'description', 'short_description', 'gps', 'bluetooth', 'usb_port'];
}
