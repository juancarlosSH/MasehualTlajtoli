<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function consultar_actividades_curso($id){
        $curso_seleccionado = App\Models\Course::findOrFail($id);
        $actividades_disponibles = App\Models\Activity::where('course_id', $id)->get();
        return view('actividades.actividades_curso', compact('actividades_disponibles'));
    }
}
