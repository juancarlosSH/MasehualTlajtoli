<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;


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

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $assignedCourses = collect(array_unique($auxiliar));
        $perPage = 5;
        $currentPageCourses = $assignedCourses->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedCourses= new LengthAwarePaginator($currentPageCourses , count($assignedCourses), $perPage);
        $paginatedCourses->setPath(route('inicio.home'));

        return view('inicio.home', compact('paginatedCourses'));
    }
}
