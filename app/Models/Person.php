<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_person')
                    ->using(MoviePerson::class)
                    ->withPivot('role_id')
                    ->withTimestamps();
    }
}
