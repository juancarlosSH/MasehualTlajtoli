<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('inicio.home');
    }

    public function consultar_cursos_usuario(){
        $user = User::find(Auth::id());
        $activities = $user->activities;
        $auxiliar = [];

        foreach ($activities as $activity) {
            $course = $activity->course;
            array_push($auxiliar, $course);
        }

        $courses = array_unique($auxiliar);
        $auxiliar = [];

        foreach ($courses as $course) {
            $auxiliarCourse = new AuxiliarCourse();
            $auxiliarCourse->id = $course->id;
            $auxiliarCourse->name = $course->name;
            $auxiliarCourse->slug = $course->slug;
            $auxiliarCourse->description = $course->description;
            $count = 0;
            foreach ($course->activities as $activity) {
                if (DB::table('activity_user')->where('activity_id', $activity->id)->where('user_id', $user->id)->value('status')) {
                    $count++;
                }
            }
            $auxiliarCourse->progress = round(($count * 100 / 12));
            array_push($auxiliar, $auxiliarCourse);
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $assignedCourses = collect($auxiliar);
        $perPage = 5;
        $currentPageCourses = $assignedCourses->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedCourses= new LengthAwarePaginator($currentPageCourses , count($assignedCourses), $perPage);
        $paginatedCourses->setPath(route('inicio.home'));

        return view('inicio.home', compact('paginatedCourses'));
    }
}

class AuxiliarCourse {
    public $id;
    public $name = "";
    public $slug = "";
    public $description = "";
    public $progress = 0;
}
