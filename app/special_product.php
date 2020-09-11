<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class special_product extends Model
{
    protected $primaryKey   = 'id';
    public $table           = "special_product";
    protected $fillable     = [
        'nama',
        'contact',
        'email',
        'kebutuhan',
        'referensi',
        'infotmbh',
    ];
}
