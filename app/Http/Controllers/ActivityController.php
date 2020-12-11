<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;
use App;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function consultar_actividades_curso(Course $course){
        $activities = $course->activities;
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
        return view('actividades.actividades_curso', compact('paginatedActivities'));
    }
}
