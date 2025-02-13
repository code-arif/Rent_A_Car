<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'section_id', 'name', 'description', 'image', 'discount', 'url', 'meta_title', 'meta_description', 'meta_keywords', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    //relation with section table
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    // Parent Category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Subcategories
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    //relation with product table
    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
