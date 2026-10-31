<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function images()
    {
        return $this->hasMany(MovieImage::class);
    }

    public function screning()
    {
        return $this->hasMany(Screening::class);
    }

}
