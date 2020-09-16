<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction_detail extends Model
{
    protected $guarded  = [];
    public $table       = 'transaction_detail';
    public $primaryKey  = 'TransactionID';
}
