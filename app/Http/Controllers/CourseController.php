<?php

namespace App\Http\Controllers;

use App;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseController extends Controller
{
    public function show_courses()
    {
        $user = User::get_user();
        $activities = $user->activities;
        $auxiliar = [];
        foreach ($activities as $activity) {
            $course = $activity->course;
            array_push($auxiliar, $course);
        }
        $assignedCourses = array_unique($auxiliar);
        $auxiliar = Course::all();
        $availableCourses = [];
        foreach ($auxiliar as $course) {
            if (in_array($course, $assignedCourses) == false) {
                array_push($availableCourses, $course);
            }
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $assignedCourses = collect(array_unique($availableCourses));
        $perPage = 5;
        $currentPageCourses = $assignedCourses->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedAvailableCourses= new LengthAwarePaginator($currentPageCourses , count($assignedCourses), $perPage);
        $paginatedAvailableCourses->setPath(route('cursos.cursos_disponibles'));
        return view('cursos.cursos_disponibles', compact('paginatedAvailableCourses'));
    }

    public function add_course(Course $course)
    {
        $courseActivities = $course->activities;
        $user = User::get_user();
        foreach ($courseActivities as $activity) {
            $user->activities->attach($activity->id);
        }
        return back()->with('status_true', '¡Excelente!');
    }
}
