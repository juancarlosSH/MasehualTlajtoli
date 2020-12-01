<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;

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
        $assignedCourses = new PaginationPaginator(array_unique($auxiliar), 4, 1);
        return view('inicio.home', compact('assignedCourses'));
    }
}
