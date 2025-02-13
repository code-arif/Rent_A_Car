<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // use HasFactory;
    protected $guard = 'admin';
    protected $fillable = ['name', 'type', 'vendor_id', 'email', 'mobile', 'password', 'image', 'address', 'zip', 'status', 'confirm'];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    //relation with vendor table
    public function vendor_personal()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id')->withDefault();
    }

    //relation with vendor bank table
    public function vendor_bank()
    {
        return $this->belongsTo(VendorBankDetails::class, 'vendor_id')->withDefault();
    }

    //relation with vendor business table
    public function vendor_business()
    {
        return $this->belongsTo(VendorBusinessDetails::class, 'vendor_id')->withDefault();
    }
}
