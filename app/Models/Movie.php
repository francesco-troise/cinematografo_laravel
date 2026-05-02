<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Movie extends Model
{
   public function genres(){
     return $this->belongsToMany(Genre::class);
   }

   public function people()
    {
        return $this->belongsToMany(Person::class, 'movie_person')
                    ->using(MoviePerson::class)
                    ->withPivot('role_id')
                    ->withTimestamps();
    }
}
