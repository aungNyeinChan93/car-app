<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    //
    protected $guarded = [];

    public function maker()
    {
        return $this->belongsTo(Maker::class, 'maker_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

}
