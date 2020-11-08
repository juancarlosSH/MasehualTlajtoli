<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function consultar_cursos(){
        $cursos_disponibles = App\Models\Course::all();
        return view('cursos', compact('cursos_disponibles'));
    }
}
