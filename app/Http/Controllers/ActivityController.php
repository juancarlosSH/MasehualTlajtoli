<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function consultar_actividades_curso($id){
        $id_usuario = Auth::id();
        $actividades_realizadas = App\Models\ActivityProgress::where('user_id', $id_usuario)->get();
        $actividades_generales = App\Models\Activity::where('course_id', $id)->get();
        return view('actividades.actividades_curso', compact('actividades_realizadas', 'actividades_generales'));


        //$curso_seleccionado = App\Models\Course::findOrFail($id);
        //$actividades_disponibles = App\Models\Activity::where('course_id', $id)->get();
        //return view('actividades.actividades_curso', compact('actividades_disponibles'));
    }
}
