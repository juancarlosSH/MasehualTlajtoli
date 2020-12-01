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

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'consultar_cursos_usuario'])->middleware('auth', 'verified')->name('inicio.home');

Route::get('/home/cursos', [CourseController::class, 'consultar_cursos'])->middleware('auth', 'verified')->name('cursos.cursos_disponibles');

Route::get('/home/cursos/{id}/actividades', [ActivityController::class, 'consultar_actividades_curso'])->middleware('auth', 'verified')->name('actividades.actividades_curso');

Route::get('/home/edit', [UserController::class, 'edit'])->middleware('auth', 'verified')->name('edit');

Route::put('/home/edit', [UserController::class, 'update'])->name('update');
