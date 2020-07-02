<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_table extends Model
{
    protected $table        = 'users_table';
    protected $primaryKey   = 'id';

    // public function midpayment()
    // {
    //     return $this->hasMany('App\midpayment');
    // }
}
