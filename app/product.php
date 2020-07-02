<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $primaryKey   = 'productID';
    public $table           = "product";
    protected $fillable     = [
        'productID_view',
        'Product_type',
        'Product_Name',
        'description',
        'Price',
        'quantity',
        'Gender',
        'Product_img_1',
        'Product_img_2',
        'Product_img_3',
        'Product_img_4',
        'Product_img_5',
    ];

}
