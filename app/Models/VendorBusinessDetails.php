<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorBusinessDetails extends Model
{
    protected $fillable = [
        'vendor_id',
        'shop_name',
        'shop_address',
        'shop_zip',
        'shop_city',
        'shop_mobile',
        'shop_email',
        'shop_website',
        'shop_pin',
        'shop_image',
        'shop_license',
        'shop_pan',
        'shop_gst',
        'shop_description',
    ];

    protected $hidden = [ 'created_at', 'updated_at' ];
}
