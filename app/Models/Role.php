<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cast;

class Role extends Model
{
    const DIRECTOR = 1;
    const PROTAGONIST = 2;
    const CO_POTRAGONIST = 3;
    const EXTRA = 4;
    public function Cast(){
        return $this->hasMany(Cast::class);
    }
}
