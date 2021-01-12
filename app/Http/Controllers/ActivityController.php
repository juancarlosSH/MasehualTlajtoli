<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;
use App;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function consultar_actividades_curso(Course $course){
        $activities = $course->activities;
        $courseName = $course->name;
        $auxiliar = [];

        foreach ($activities as $activity) {
            //$course = $activity->course;
            array_push($auxiliar, $activity);
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $assignedActivities = collect(array_unique($auxiliar));
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
}
