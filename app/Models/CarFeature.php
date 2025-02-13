<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeature extends Model
{
    /** @use HasFactory<\Database\Factories\CarFeatureFactory> */
    use HasFactory;


    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // const CREATED_AT = 'created_at';

    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

}
