<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boy extends Model
{
    /** @use HasFactory<\Database\Factories\BoyFactory> */
    use HasFactory;

    public function girlFriends()
    {
        return $this->belongsToMany(Girl::class, 'boys_girls')->withTimestamps();
    }
}
