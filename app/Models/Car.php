<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;
    protected $guarded = [];

    public function maker()
    {
        return $this->belongsTo(Maker::class, 'maker_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function models()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }
    public function carType()
    {
        return $this->belongsTo(CarType::class, 'car_type_id');
    }
    public function fuelType()
    {
        return $this->belongsTo(FuelType::class, 'fuel_type_id');
    }
}
