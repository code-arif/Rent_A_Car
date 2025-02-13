<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'pin',
        'status',
        'confirm',
    ];
    protected $hidden = ['created_at', 'updated_at' ];

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
