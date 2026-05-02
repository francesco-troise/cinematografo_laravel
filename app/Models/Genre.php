<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Movie;

class Genre extends Model
{
    const SCIENZE_FICTION = 1;
    const THRILLER = 2;
    const DRAMA = 3;
    const ACTION = 4;
    const CRIME= 5;
    const ADVENTURE= 6;
    const ROMANCE = 7;
    const FANTASY = 8;

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
