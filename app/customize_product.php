<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customize_product extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $table = "";
    public $fillable = [
        'user_id',
        'nama',
        'contact',
        'email',
        'kebutuhan',
        'referensi',
        'infotmbh',
    ];
}
