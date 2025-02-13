<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVideos extends Model
{
    protected $fillable = [
        'product_id',
        'video_url',
    ];
}
