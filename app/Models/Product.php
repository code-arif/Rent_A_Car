<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id', 'admin_id', 'category_id', 'brand_id', 'admin_type', 'product_name', 'slug', 'sku', 'price', 'image', 'stock_quantity', 'stock_status', 'remark', 'short_description', 'meta_title', 'meta_description', 'meta_keywords', 'has_discount', 'discount_price', 'status', 'is_featured'];

    // **Relationships**

    // Product belongs to a Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    // Product belongs to a Section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // Product belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product belongs to a Brand (nullable)
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relation with Admin table
    public function admin()
    {
        return $this->belongsTo(Admin::class)->select(['id', 'vendor_id', 'name', 'type']);
    }

    // Product has one Product Detail
    public function product_details()
    {
        return $this->hasOne(ProductDetails::class);
    }

    // Product has many Specifications (if stored in separate table)
    public function specifications()
    {
        return $this->hasOne(ProductSpecification::class);
    }

    //relation with product images
    public function productImages(){
        return $this->hasMany(ProductImages::class);
    }
}
