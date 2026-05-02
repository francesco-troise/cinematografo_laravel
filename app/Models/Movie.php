<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Cast;

class Movie extends Model
{
   public function genres(){
     return $this->belongsToMany(Genre::class);
   }

   public function people()
    {
        return $this->belongsToMany(Person::class, 'cast')
                    ->using(Cast::class)
                    ->withPivot('role_id')
                    ->withTimestamps();
    }
}
