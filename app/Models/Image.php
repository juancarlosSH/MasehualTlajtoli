<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * Function that allows a polymorphic relationship between Image and Activity
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
