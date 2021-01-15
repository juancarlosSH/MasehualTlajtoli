<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;
use App;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function consultar_actividades_curso(Course $course){
        $activities = $course->activities;
        $user = Auth::user();
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
            $auxiliarActivity->status = DB::table('activity_user')
            ->where('activity_id', $activity->id)
            ->where('user_id', $user->id)
            ->value('status');
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

    public function mostrar_actividad(Course $course, Activity $activity)
    {
        return view('actividades.actividad', compact('course', 'activity'));
    }

    public function evaluar_actividad(Request $request, Course $course, Activity $activity)
    {
        if($request->response == $activity->answer){
            $user = Auth::user();
            DB::table('activity_user')->where([
                ['activity_id', '=', $activity->id],
                ['user_id', '=', $user->id],
            ])->update(['status' => true]);
            return back()->with('status_true', '¡Excelente!');
        }else{
            return back()->with('status_false', '¡Oh oh!');
        }
    }
}

class AuxiliarActivity {
    public $id;
    public $name = "";
    public $slug = "";
    public $description = "";
    public $question = "";
    public $answer = "";
    public $status = false;
    public $courseSlug = "";
}
