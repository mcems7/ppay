<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    
    public $timestamps = true;
    public $incrementing = true;
    
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_mobile',
        'status'
    ];
}
