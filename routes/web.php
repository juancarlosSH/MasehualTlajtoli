<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio.welcome');
})->name('inicio.welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('inicio.home');

Route::get('cursos', [CourseController::class, 'consultar_cursos'])->name('cursos.cursos_disponibles');

//Route::get('cursos/{id}', [App\Http\Controllers\CourseController::class, 'detalle_curso'])->name('cursos.detalle');

Route::get('cursos/{id}/actividades', [ActivityController::class, 'consultar_actividades_curso'])->name('actividades.actividades_curso');

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
