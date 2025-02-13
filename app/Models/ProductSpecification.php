<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    protected $fillable = ['product_id', 'size', 'color', 'material', 'weight', 'length', 'width', 'height', 'volume', 'weight_unit', 'length_unit', 'width_unit', 'height_unit',
    'volume_unit', 'additional_price'];

    // ✅ One Specification belongs to One Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
