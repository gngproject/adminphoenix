<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    protected $primaryKey   = "voucherID";
    public $table           = "voucher";
    protected $fillable     = [
        'voucherID_view',
        'voucherCode',
        'type',
        'voucherPercent',
        'voucherDiscount',
        'voucherMax_user',
    ];
}
