<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cast;

class Person extends Model
{
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'cast')
                    ->using(Cast::class)
                    ->withPivot('role_id')
                    ->withTimestamps();
    }

    public function roles()
{
    return $this->belongsToMany(Role::class, 'cast', 'person_id', 'role_id')
                ->withTimestamps();
}
}
