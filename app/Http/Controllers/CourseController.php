<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function consultar_cursos(){
        $user = User::find(Auth::id());
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
        return view('cursos.cursos_disponibles', compact('availableCourses'));
    }

    public function detalle_curso($id){
        $curso_seleccionado = App\Models\Course::findOrFail($id);
        return view('cursos.detalle', compact('curso_seleccionado'));
    }
}
