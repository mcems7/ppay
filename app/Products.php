<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    
    public $timestamps = true;
    public $incrementing = true;
    
    protected $fillable = [
        'product_name',
        'product_photo',
        'product_price',
        'product_detail'
    ];
    
}
