<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class advertisment extends Model
{
    // protected $guarded = [];
    public $table = 'advertise';
    public $primaryKey = 'advertiseID';
    public $fillable = [
        'advertiseID_view',
        'advertise_img',
        'advertise_name',
        'advertise_description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
