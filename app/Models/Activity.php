<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model
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
     * This function obtains a status of the activity to know if the activity has been completed
     * $activity - Variable that contains the activity that belongs to the user
     * $user - Variable that contains the information of the authenticated user
     */
    public static function get_status($activity, $user)
    {
        return DB::table('activity_user')->where([
            ['activity_id', '=', $activity->id],
            ['user_id', '=', $user->id],
        ])->value('status');
    }

    /**
     * This function changes the status of the activity to true that means that the activity is completed
     * $activity - Variable that contains the status activity that will be changed
     * $user - Variable that contains the information of the authenticated user
     */
    public static function set_status($activity, $user)
    {
        DB::table('activity_user')->where([
            ['activity_id', '=', $activity->id],
            ['user_id', '=', $user->id],
        ])->update(['status' => true]);
    }

    /**
     * Function that contains the relationship Many to one between Activity and Course
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    /**
     * Function that contains the relationship Many to many between Activity and Course
     */
    public function activities()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Function that contains the relationship One to one between Activity and Image
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
