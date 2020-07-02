<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class midpayment extends Model
{
    protected $guarded = [];
    public $table = 'midpayments';
    public $primaryKey = 'id';

}
