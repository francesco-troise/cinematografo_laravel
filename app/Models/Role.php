<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MoviePerson;

class Role extends Model
{
    public function moviePeople(){
        return $this->hasMany(MoviePerson::class);
    }
}
