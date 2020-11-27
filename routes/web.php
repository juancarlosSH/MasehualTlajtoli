<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio.welcome');
})->name('inicio.welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'consultar_cursos_usuario'])->name('inicio.home');

Route::get('/home/cursos', [CourseController::class, 'consultar_cursos'])->name('cursos.cursos_disponibles');

Route::get('/home/cursos/{id}/actividades', [ActivityController::class, 'consultar_actividades_curso'])->name('actividades.actividades_curso');

Route::get('/home/{name}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::put('/home/{user}', [UserController::class, 'update'])->name('user.update');

/*
/
|_/home
  |_/edit
  |_/cursos
  |_/showcurso
    |_actividad
|_/login
|_/register
*/
