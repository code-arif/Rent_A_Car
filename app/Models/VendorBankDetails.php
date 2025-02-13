<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorBankDetails extends Model
{
    protected $fillable = [
        'vendor_id',
        'bank_name',
        'account_number',
        'account_holder_name',
        'branch_name',
        'ifsc_code',
        'swift_code',
        'bank_address'
    ];
}
