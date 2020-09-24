<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customize_product extends Model
{
    protected $guarded  = [];
    public $table       = 'customize_product';
    public $primaryKey  = 'id';
}
