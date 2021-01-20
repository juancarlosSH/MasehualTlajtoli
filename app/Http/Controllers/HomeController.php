<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    const totalActivities = 12;

    /**
     * Show the application dashboard that it is the view's home
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('inicio.home');
    }

    /**
     * This function shows all the courses that the authenticated user has assigned
     */
    public function show_user_courses()
    {
        $user = User::get_user();
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
                if (Activity::get_status($activity, $user)) {
                    $count++;
                }
            }
            $auxiliarCourse->progress = round(($count * 100 / self::totalActivities));
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

/**
 * This class is created to set new values that the Course model does not contain
 */
class AuxiliarCourse
{
    public $id;
    public $name = "";
    public $slug = "";
    public $description = "";
    public $progress = 0;
}
