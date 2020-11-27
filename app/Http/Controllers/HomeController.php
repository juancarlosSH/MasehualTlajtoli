<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $id = Auth::id();
        $actividades_realizadas = App\Models\ActivityProgress::where('user_id', $id)->get();
        $actividades_generales = App\Models\Activity::all();
        $cursos_generales = App\Models\Course::all();
        return view('inicio.home', compact('actividades_realizadas', 'actividades_generales', 'cursos_generales'));
    }
}
