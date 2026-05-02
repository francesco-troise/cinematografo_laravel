<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Movie;
use App\Models\Person;
use App\Models\Role;

class Cast extends Pivot
{

    protected $table = 'cast';

    public $incrementing = true;

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
