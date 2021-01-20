<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseController extends Controller
{
    /**
     * This function shows all the available courses that the authenticated user does not have
     */
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

    /**
     * This function allows to the authenticated user add a new course to answer it and the function returns a succesfully status
     * $course - Variable of type Course that contains information of the course that the user wants to add
     */
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
