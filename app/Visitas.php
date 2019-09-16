<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    protected $table = 'visitas';
    protected $primaryKey = 'id';
    
    public $timestamps = true;
    public $incrementing = true;
    
    protected $fillable = [
        'codigo'
    ];
    
}
