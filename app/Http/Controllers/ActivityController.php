<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Activity;
use App\Models\User;

class ActivityController extends Controller
{
    /**
     * This function shows all the activities that belongs to the selected course
     * $course - Variable of type Course that contains information of the selected course
     */
    public function show_course_activity(Course $course)
    {
        $activities = $course->activities;
        $user = User::get_user();
        $courseName = $course->name;
        $auxiliar = [];

        foreach ($activities as $activity) {
            $auxiliarActivity = new AuxiliarActivity();
            $auxiliarActivity->id = $activity->id;
            $auxiliarActivity->name = $activity->name;
            $auxiliarActivity->slug = $activity->slug;
            $auxiliarActivity->description = $activity->description;
            $auxiliarActivity->question = $activity->question;
            $auxiliarActivity->answer = $activity->answer;
            $auxiliarActivity->status = Activity::get_status($activity, $user);
            $auxiliarActivity->courseSlug = $course->slug;
            array_push($auxiliar, $auxiliarActivity);
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $assignedActivities = collect($auxiliar);
        $perPage = 5;
        $currentPageActivities = $assignedActivities->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedActivities= new LengthAwarePaginator($currentPageActivities , count($assignedActivities), $perPage);
        $paginatedActivities->setPath(route('actividades.actividades_curso', $course));
        return view('actividades.actividades_curso', compact('paginatedActivities', 'courseName'));
    }

    /**
     * This function opens the view of individual activity that the user selected
     * $course - Variable of type Course that contains information of the selected course
     * $activity - Variable of type Activity that contains information of the selected activity
     */
    public function show_activity(Course $course, Activity $activity)
    {
        return view('actividades.actividad', compact('course', 'activity'));
    }

    /**
     * This function evaluates the user's answer to the Database and return a status message for success or error
     * $request - Variable of type Request that contains the user's answer of the actividad view
     * $activity - Variable of type Activity that contains the activity that it is resolving
     */
    public function evaluate_activity(Request $request, Course $course, Activity $activity)
    {
        if ($request->validate(['response'=>'required|string|alpha|max:15'])) {
            if(strtolower($request->response) == $activity->answer){
                $user = User::get_user();
                Activity::set_status($activity, $user);
                return back()->with('status_true', '¡Excelente!');
            }else{
                return back()->with('status_false', '¡Oh oh!');
            }
        }
    }
}

/**
 * This class is created to set new values that the Activity model does not contain
 */
class AuxiliarActivity
{
    public $id;
    public $name = "";
    public $slug = "";
    public $description = "";
    public $question = "";
    public $answer = "";
    public $status = false;
    public $courseSlug = "";
}
