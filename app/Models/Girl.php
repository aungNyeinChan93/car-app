<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Girl extends Model
{
    /** @use HasFactory<\Database\Factories\GirlFactory> */
    use HasFactory;

    public function boyFriends()
    {
        return $this->belongsToMany(Boy::class, 'boys_girls')->withTimestamps();
    }
}
