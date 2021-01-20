<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function get_status($activity, $user)
    {
        return DB::table('activity_user')->where([
            ['activity_id', '=', $activity->id],
            ['user_id', '=', $user->id],
        ])->value('status');
    }

    public static function set_status($activity, $user)
    {
        DB::table('activity_user')->where([
            ['activity_id', '=', $activity->id],
            ['user_id', '=', $user->id],
        ])->update(['status' => true]);
    }

    //Relación muchos a 1
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    //Relación muchos a muchos
    public function activities()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //Relación polimorfica 1 a 1 imagen actividad
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
