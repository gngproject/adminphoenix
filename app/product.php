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
        'Price',
        'quantity',
        'emas_karat',
        'berlian_karat1',
        'berlian_karat2',
        'berlian_karat3',
        'berlian_karat4',
        'quantity_berlian1',
        'quantity_berlian2',
        'quantity_berlian3',
        'quantity_berlian4',
        // 'typeID',
        'Gender',
        'Product_img_1',
        'Product_img_2',
        'Product_img_3',
        'Product_img_4',
        'Product_img_5',
    ];
}
