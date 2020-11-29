<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    //Relación muchos a 1
    public function course()
    {
        return $this->belongsTo('app\Models\Course');
    }

    //Relación muchos a muchos
    public function activities()
    {
        return $this->belongsToMany('app\Models\User');
    }

    //Relación polimorfica 1 a 1 imagen actividad
    public function image()
    {
        return $this->morphOne('app\Models\Image', 'imageable');
    }
}
