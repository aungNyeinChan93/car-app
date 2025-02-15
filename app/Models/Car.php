<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function maker(): BelongsTo
    {
        return $this->belongsTo(Maker::class, 'maker_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function models(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function carType(): BelongsTo
    {
        return $this->belongsTo(CarType::class, 'car_type_id');
    }

    public function fuelType(): BelongsTo
    {
        return $this->belongsTo(FuelType::class, 'fuel_type_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }

    public function favouriteUsers()
    {
        return $this->belongsToMany(User::class, 'cars_users');
    }

    public function carFeature(): HasOne
    {
        return $this->hasOne(CarFeature::class);
    }
    public function getName(): mixed
    {
        return $this->name;
    }

    public function singleImage(): HasOne
    {
        return $this->hasOne(CarImage::class, 'car_id', 'id')->oldestOfMany('id');
    }
}
