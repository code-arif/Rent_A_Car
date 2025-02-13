<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSlider extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'short_description',
        'price',
        'image',
        'status',
    ];

    //relation with product table
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
