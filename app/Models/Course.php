<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * This function obtains a route identified by a key name and returns a slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Function that contains the relationship One to many between Course and Activity
     */
    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }
}
