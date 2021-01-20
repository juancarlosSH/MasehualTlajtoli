<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio.welcome');
})->name('inicio.welcome');

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'show_user_courses'])->middleware('auth', 'verified')->name('inicio.home');

Route::get('/home/cursos', [CourseController::class, 'show_courses'])->middleware('auth', 'verified')->name('cursos.cursos_disponibles');

Route::post('/home/cursos/{course}', [CourseController::class, 'add_course'])->middleware('auth', 'verified')->name('cursos.add');

Route::get('/home/{course}/actividades', [ActivityController::class, 'show_course_activity'])->middleware('auth', 'verified')->name('actividades.actividades_curso');

Route::get('/home/{course}/{activity}', [ActivityController::class, 'show_activity'])->middleware('auth', 'verified')->name('actividades.actividad');

Route::post('/home/{course}/{activity}', [ActivityController::class, 'evaluate_activity'])->name('actividad.evaluar');
