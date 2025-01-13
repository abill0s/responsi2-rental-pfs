<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'model',
        'brand',
        'year',
        'price',
        'seat',
        'fuel',
        'transmission'
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'car_id');
    } 
}
