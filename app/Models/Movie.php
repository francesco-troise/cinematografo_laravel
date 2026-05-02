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

    public function getDirector(){
        return $this->people->where('pivot.role_id', 1)->first();
    }

    public function getDirectorName(){
      $director = $this->getDirector();
      return $director->name . " " . $director->last_name ;
    }

    public function getGenres(){
      return $this->genres->pluck('name')->implode(', ');
    }
}
