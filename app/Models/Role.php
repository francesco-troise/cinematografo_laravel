<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cast;

class Role extends Model
{
    public function moviePeople(){
        return $this->hasMany(Cast::class);
    }
}
