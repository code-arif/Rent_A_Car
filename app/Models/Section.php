<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Inertia\Inertia;

class Section extends Model
{
    protected $fillable = ['sec_name', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    //reation with category table
    public function categories()
    {
        return $this->hasMany(Category::class, 'section_id')
            ->whereNull('parent_id')
            ->where('status', 1)
            ->select(['id', 'name', 'section_id', 'url'])->with('subcategories');
    }
}
