<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'duration',
        'total_price',
        'status',
        'user_id',
        'car_id',
    ];

    public static function getAllCars()
    {
        // Assuming you have a Car model
        $cars = Car::all()->pluck( 'model', 'id');
        return $cars;
    }

    public static function getAllUsers()
    {
        // Assuming you have a Car model
        $users = User::all()->pluck( 'name', 'id');
        return $users;
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    } 

    public function user()
    {
        return $this->belongsTo(User::class, 'car_id');
    }    
}
